<?php
session_start();
header("Content-Type: application/json");

// DB CONFIG
$servername = "localhost";
$username   = "codesol1_narayanaschoolsU";
$password   = "ZZ0MHxzIW[A9u(lN";
$dbname     = "codesol1_narayanaschools";

// JSON INPUT
$input = json_decode(file_get_contents("php://input"), true);

// VARIABLES
$name             = trim($input['name'] ?? '');
$phone            = trim($input['phone'] ?? '');
$parent_email     = trim($input['parent_email'] ?? '');
$city             = trim($input['city'] ?? '');
$branch           = trim($input['branch'] ?? '');
$board            = trim($input['board'] ?? '');
$reservation_type = trim($input['reservation_type'] ?? '');
$class            = trim($input['classes'] ?? '');
$utm_source       = $input['utm_source'] ?? '';
$utm_medium       = $input['utm_medium'] ?? '';
$utm_campaign     = $input['utm_campaign'] ?? '';
$redirect_from    = $input['redirect_from'] ?? '';


// BASIC VALIDATION
if ($name == '' || !preg_match('/^[6-9][0-9]{9}$/', $phone)) {

    echo json_encode([
        "status" => false,
        "message" => "Invalid input"
    ]);
    exit;
}


// GENERATE OTP
$otp = rand(100000,999999);

// STORE OTP IN SESSION
$_SESSION['otp'][$phone] = $otp;


// DB CONNECTION
$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {

    echo json_encode([
        "status" => false,
        "message" => "DB connection failed"
    ]);
    exit;

}


// INSERT LEAD
$sql = "INSERT INTO leads 
(entrydate,name,parent_email,phone,city,branch,board,reservation_type,class,utm_source,utm_medium,utm_campaign,redirect_from)
VALUES (NOW(),?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
"ssssssssssss",
$name,
$parent_email,
$phone,
$city,
$branch,
$board,
$reservation_type,
$class,
$utm_source,
$utm_medium,
$utm_campaign,
$redirect_from
);

$stmt->execute();

// GET INSERT ID
$lead_id = $stmt->insert_id;

$stmt->close();


// SEND SMS OTP
$url = "https://njportal.thenoncoders.in/api/v1/send_sms?mobile={$phone}&otp_or_msg={$otp}&type=RNETSC_OTP";

$headers = [
"sms_api_key: x908707x7f0c36aedab814_eb0390cef345_D15C968A8C79C44552B91F7B6"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

$conn->close();


// RESPONSE
echo json_encode([
"status" => true,
"message" => "OTP sent successfully",
"lead_id" => $lead_id
]);