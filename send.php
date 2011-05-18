<?
include 'functions.inc.php';

echo $_FILES['attachment']['tmp_name'];

$mailster = new Mailster($_POST["name"]);
$mailster->send($_POST["subject"], $_POST["body"]);
echo "Sent!";
?>
