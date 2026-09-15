<?php

session_start();
header("Content-Type: application/json");

$servername="localhost";
$username="codesol1_narayanaschoolsU";
$password="ZZ0MHxzIW[A9u(lN";
$dbname="codesol1_narayanaschools";

$input=json_decode(file_get_contents("php://input"),true);

$name=$input['name'] ?? '';
$email=$input['parent_email'] ?? '';
$phone=$input['phone'] ?? '';
$city=$input['city'] ?? '';
$class=$input['class'] ?? 'NA';

$utm_source=$input['utm_source'] ?? '';
$utm_medium=$input['utm_medium'] ?? '';
$utm_campaign=$input['utm_campaign'] ?? '';

$branch=$city;
$board=$class;
$reservation_type="NA";

$redirect_from="ccnarayanacoachingcenters_new";

$otp=rand(100000,999999);

$_SESSION['otp'][$phone]=$otp;

$conn=new mysqli($servername,$username,$password,$dbname);

$sql="INSERT INTO leads
(entrydate,name,parent_email,phone,city,branch,board,reservation_type,course,utm_source,utm_medium,utm_campaign,redirect_from)
VALUES(NOW(),?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt=$conn->prepare($sql);

$stmt->bind_param(
"ssssssssssss",
$name,
$email,
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

$lead_id=$stmt->insert_id;

/* SEND SMS */

$url="https://njportal.thenoncoders.in/api/v1/send_sms?mobile={$phone}&otp_or_msg={$otp}&type=RNETSC_OTP";

$headers=[
"sms_api_key: x908707x7f0c36aedab814_eb0390cef345_D15C968A8C79C44552B91F7B6"
];

$ch=curl_init($url);

curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

curl_exec($ch);

curl_close($ch);

echo json_encode([
"status"=>true,
"lead_id"=>$lead_id
]);

?>