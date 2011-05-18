<? 

include 'functions.inc.php';

$name=$_POST["name"];
$display_name=$_POST["display_name"];
$address=$_POST["address"];
$emails=$_POST["emails"];

Mailster::save($name, $display_name, $address, $emails);

echo "Saved.";
echo "<br/>";
echo "<a href='list.php'>Back to list</a>";
?>