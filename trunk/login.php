<?php
require_once("header.php");

//#############################################
//## START AUTHENTICATION
//#############################################

// If already logged in, no need to login again
	
if (isset($userdata)) {
     redirect("index.php");
}
else { 

	if (isset($_GET['e'])) {
		$e = $_GET['e'];
		
		if ($e == 1) {
			$error = $lang_login['missing_fields'];
		}
		if ($e == 2) {
			$error = $lang_login['incorrect_values'];
		}
        	if ($e == 3) {
			$error = $lang_login['requires_verify'];
		}	
		if ($e == 4) {
			$error = $lang_login['create_disabled'];
		}
	}

	// Now start the authentication

	if (isset($_POST['login'])) {
		if (empty($_POST['uname']) || empty($_POST['pass'])) {
			redirect("login.php?e=1");
		}
		else {
			$uname = $sqlr->smartquote($_POST['uname']);
			$pass = $sqlr->smartquote($_POST['pass']);
			$password = sha1(strtoupper($uname .":". $pass));
			$realm = $sqlr->smartquote($_POST['realm']);
					
			if ($email_verify) {
				$query = $sqlt->query("SELECT * FROM account WHERE username='$uname' AND sha_pass_hash='$password'");
				if ($sqlt->num_rows($query) > 0) {
					redirect("login.php?e=3");
				}
				else {
					$query = $sqlr->query("SELECT * FROM account WHERE username='$uname' AND sha_pass_hash='$password'");
					if ($sqlr->num_rows($query) < 1) {
						redirect("login.php?e=2");
					}
					else {
						$_SESSION['uname'] = $uname;
						redirect("index.php");
					}
				}
			}
			else {
			    $query = $sqlr->query("SELECT * FROM account WHERE username='$uname' AND sha_pass_hash='$password'");
				if ($sqlr->num_rows($query) < 1) {
					redirect("login.php?e=2");
				}
				else {
					$_SESSION['uname'] = $uname;
					$_SESSION['realm'] = $realm;
					redirect("index.php");
				}
			}
		}
	}
	
}
// Time to display the login form.

$output .= '<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Login</div>
					<div class="contentbox_body">';
					if (isset($error)) {				
						$output .= '<div class="statusmessage failure">'.$error.'</div>';
					}
					$output .= '<form method="post" action="">
							<label for="uname" class="login">Username:</label><br />
							<input type="text" name="uname" id="uname" value="" /><br />
							<label for="pass" class="login">Password:</label><br />
							<input type="password" id="pass" name="pass" /><br />Realm <br />
							<select name="realm">';
$query = $sqlr->query("SELECT name FROM realmlist");
	while ($realms = mysql_fetch_array($query)) {
		$output .= '<option value="'.$realms['name'].'">'.$realms['name'].'</option>';
	}
$output .= '			    </select> <br />
							<input type="checkbox" name=""/> Remember Me<br />
							<input type="hidden" name="login" value="1" />
							<input type="submit" value="Login" />
						</form>
						';
						if (!empty($allow_creation)) {
							$output.= '<a href="register.php">Create an account</a>';
						}
						$output .= '
					</div>
				</div>
			</div>
			<div id="clear">
			</div></div>';

require_once("footer.php");

echo $output;
?>
		
