<? 
include 'functions.inc.php';
$mailster = new Mailster($_GET["name"]);
?>
<html>
<head>
	<title>Edit <?= $mailster->display_name() ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Editing Mailing List '<?= $mailster->display_name() ?>'</h1>
<? form($mailster->name(), $mailster->display_name(), $mailster->address(), $mailster->emails()); ?>
</body>
</html>