<?
include 'functions.inc.php';
$mailster = new Mailster($_GET["name"]);
$mailster->delete();
echo "Deleted!";
?>