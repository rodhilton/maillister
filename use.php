<? 
include 'functions.inc.php';
$mailster = new Mailster($_GET["name"]);
?>
<html>
<head>
	<title>Using <?= $mailster->display_name() ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>Using <?= $mailster->display_name() ?></h1>

	<form enctype="multipart/form-data" action="send.php" method="post">
		<input type="hidden" name="name" value="<?= $mailster->name() ?>">
		<table>
			<tr>
				<td>From:</td><td><input type="text" disabled="true" value="<?= $mailster->from() ?>">
			<tr>
				<td>Subject:</td><td><input type="text" name="subject"></td>
			</tr>
			<tr>
				<td>Body:</td><td><textarea name="body" cols="80" rows="30"></textarea></td>
			</tr>
			<tr>
				<td>Attachment:</td><td><input name="attachment" type="file" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Send!"/></td>
			</tr>
		</table>
	</form>
</body>
</html>
