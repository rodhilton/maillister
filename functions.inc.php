<?
class Mailster
{
	var $name;
	var $display_name;
	var $address;
	var $emails;
	
	function __construct($name) {
		$this->name = $name;
		$fh = fopen("$name.maillister", "r");
		$this->display_name=trim(fgets($fh));
		$this->address=trim(fgets($fh));
		$this->emails="";
		while (!feof($fh)) {
			$this->emails .= fgets($fh);
		}
		fclose($fh);
	}
	
	function name() {
		return $this->name;
	}
	
	function display_name() {
		return $this->display_name;
	}
	
	function address(){
		return $this->address;
	}
	
	function emails() {
		return $this->emails;
	}
	
	function from() {
		return "$this->display_name <$this->address>";
	}
	
	function send($subject, $body) {
		$email_array = array();
		$email_addresses=split("[\n|\r]", $this->emails);
		foreach($email_addresses as $email_address) {
			if(!empty($email_address) && strlen(trim($email_address)) > 0) {
				$email_array[] = trim($email_address);
			}
		}
		$headers = "From: " . $this->from() . "\r\n";
		$headers .= "Bcc: "  . implode(",",$email_array) . "\r\n";
		return mail($this->from(), $subject, $body, $headers);
	}
	
	function delete() {
		unlink("$this->name.maillister");
	}
	
	public static function save($name, $display_name, $address, $emails) {
		$display_name=stripslashes($display_name);
		$new_name = preg_replace('/[^A-Za-z0-9]/',"", $name);
		$myFile = "$new_name.maillister";
		$fh = fopen($myFile, 'w+') or die("can't open file");
		fwrite($fh, "$display_name\n");
		fwrite($fh, "$address\n");
		fwrite($fh, "$emails");
		fclose($fh);
	}
}

function form($name="", $display_name="", $address="", $emails="") {
?>
	<form action="save.php" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?= $name ?>"></td>
			</tr>
			<tr>
				<td>Display Name:</td>
				<td><input type="text" name="display_name" value="<?= $display_name ?>"></td>
			</tr>
			<tr>
				<td>'From' Address:</td>
				<td><input type="text" name="address" value="<?= $address ?>"></td>
			</tr>
			<tr>
				<td>Email Addresses:<br/>(one per line)</td>
				<td><textarea name="emails" rows="20" cols="60"><?= $emails ?></textarea></td>
			</tr>
			<tr>
				<td><button type="submit" value="Save">Save!</button></td>
			</tr>
		</table>
	</form>
<?
}

?>
