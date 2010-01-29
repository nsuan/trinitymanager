<?php
session_start();
if (!empty($_POST['realm'])) {
	$_SESSION['realm'] = $_POST['realm'];
}

function getrealm($id) {
	mysql_connect("localhost","trinity","trinity");
	mysql_select_db("realmd");
	$result = mysql_fetch_assoc(mysql_query("SELECT name FROM realmlist WHERE id='$id'"));
	
	return $result['name'];
}
	mysql_connect("localhost","trinity","trinity");
	mysql_select_db("realmd");
$realms = mysql_fetch_array(mysql_query("SELECT name FROM realmlist"));

?>
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
<select name="realm" onChange="javascript: this.form.submit();">
<?php
while ($realms as $list) {
	if ($list == $_SESSION['realm']) {
		echo '<option selected>'.$list.'</option>';
	}
	else {
		echo '<option>'.$list.'</option>';
	}
}
</select>
<form>