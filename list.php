<html>
<head>
	<title>Mailing Lists</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Mailing Lists</h1>
<ul>
<?
foreach (glob("*.mailster") as $filename) {
	$name = preg_replace('/\.mailster$/', "", $filename);
	echo "<li>";
    echo "$name";
	echo " [<a href='edit.php?name=$name'>Edit</a>]";
	echo " [<a href='delete.php?name=$name' onClick='return confirm(\"Are you sure you want to delete this mailing list?\")'>Delete</a>]";
	echo " [<a href='use.php?name=$name'>Use</a>]";
	echo "</li>";
}
?>
</ul>
<a href="new.php">Create New Mailing List</a>
</body>
</html>