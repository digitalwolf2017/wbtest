<?php
session_start();
header("Content-Type: application/json");

// DB CONFIG
$servername = "localhost";
$username   = "codesol1_narayanaschoolsU";
$password   = "ZZ0MHxzIW[A9u(lN";
$dbname     = "codesol1_narayanaschools";

// Read JSON
$input = json_decode(file_get_contents("php://input"), true);

// Variables
$name           = trim($input['name'] ?? '');
$phone          = trim($input['phone'] ?? '');
$parent_email   = trim($input['parent_email'] ?? '');
$city           = trim($input['city'] ?? '');
$branch         = trim($input['branch'] ?? '');
$board          = trim($input['board'] ?? '');
$reservation_type = trim($input['reservation_type'] ?? '');
$class          = trim($input['classes'] ?? '');
$class_category = trim($input['class_category'] ?? $input['classCategory'] ?? '');

// Server-side fallback: compute class_category from class if empty
if ($class_category === '' && $class !== '') {
    $cat1 = ['E-KIDZ-N (Nursery)', 'E-KIDZ-PP1 (L.K.G)', 'E-KIDZ-PP2 (U.K.G)', 'E-CHAMPS-1', 'E-CHAMPS-2'];
    $cat2 = ['E-CHAMPS-3', 'E-CHAMPS-4', 'E-CHAMPS-5', 'VI', 'VII', 'VIII', 'IX', 'X'];
    $cat3 = ['XI', 'XII'];
    if (in_array($class, $cat1)) {
        $class_category = 'Category 1';
    } elseif (in_array($class, $cat2)) {
        $class_category = 'Category 2';
    } elseif (in_array($class, $cat3)) {
        $class_category = 'Category 3';
    }
}
$utm_source     = trim($input['utm_source'] ?? '');
$utm_medium     = trim($input['utm_medium'] ?? '');
$utm_campaign   = trim($input['utm_campaign'] ?? '');
$redirect_from  = $input['redirect_from'] ?? '';

if ($name == '' || !preg_match('/^[6-9][0-9]{9}$/', $phone)) {
    echo json_encode(["status" => false, "message" => "Invalid input"]);
    exit;
}

// Generate OTP
$otp = rand(100000, 999999);
$_SESSION['otp'][$phone] = $otp;

// DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["status" => false, "message" => "DB connection failed"]);
    exit;
}

$sql = "INSERT INTO leads 
(entrydate, name, parent_email, phone, city, branch, board, reservation_type, class, class_category, utm_source, utm_medium, utm_campaign, redirect_from) 
VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["status" => false, "message" => "DB prepare error: " . $conn->error]);
    exit;
}

$stmt->bind_param(
    "sssssssssssss", // ✅ 13 s
    $name,
    $parent_email,
    $phone,
    $city,
    $branch,
    $board,
    $reservation_type,
    $class,
    $class_category,
    $utm_source,
    $utm_medium,
    $utm_campaign,
    $redirect_from
);

if (!$stmt->execute()) {
    echo json_encode(["status" => false, "message" => "DB execute error: " . $stmt->error]);
    exit;
}


// GET INSERTED ID
$lead_id = $stmt->insert_id;

$stmt->close();

// SEND SMS
$url = "https://njportal.thenoncoders.in/api/v1/send_sms?mobile={$phone}&otp_or_msg={$otp}&type=RNETSC_OTP";
$headers = [
    "sms_api_key: x908707x7f0c36aedab814_eb0390cef345_D15C968A8C79C44552B91F7B6"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$response = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$apiStatus = 'success';
$apiMessage = '';

if ($curlError) {
    $apiStatus = 'error';
    $apiMessage = $curlError;
} elseif ($httpCode < 200 || $httpCode >= 300) {
    $apiStatus = 'error';
    $apiMessage = "HTTP {$httpCode}";
} else {
    $decodedResponse = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        if (isset($decodedResponse['status']) && $decodedResponse['status'] !== true && $decodedResponse['status'] !== 'true') {
            $apiStatus = 'error';
            $apiMessage = isset($decodedResponse['message']) ? $decodedResponse['message'] : 'API returned non-success status';
        }
    }
}

$logSql = "INSERT INTO otp_send_logs (lead_id, phone, otp, api_url, api_response, api_status, error_message, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
$logStmt = $conn->prepare($logSql);
$logResponse = $response !== false ? $response : '';
$logError = $apiStatus === 'error' ? $apiMessage : '';
$logStmt->bind_param("issssss", $lead_id, $phone, $otp, $url, $logResponse, $apiStatus, $logError);
$logStmt->execute();
$logStmt->close();

$conn->close();

// RESPONSE WITH ID
// echo json_encode([
//     "status" => $apiStatus === 'success',
//     "message" => $apiStatus === 'success' ? "OTP sent" : "OTP send failed: {$apiMessage}",
//     "lead_id" => $lead_id
// ]);
echo json_encode([
    "status"  => true,
    "message" => $apiStatus === 'success' ? "OTP sent" : "OTP send failed: {$apiMessage}",
    "lead_id" => $lead_id,
]);
?>