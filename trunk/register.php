<?php
require_once("header.php");

//#############################################
//## START AUTHENTICATION
//#############################################

// If already logged in, no need to show registration page

if (isset($userdata)) {
     redirect("index.php");
}

if (isset($_GET['e'])) {
	$e = $_GET['e'];

        if ($e == 1) {
		$error = $lang_register['missing_fields'];
	}
	elseif ($e == 2) {
		$error = $lang_register['invalid_email'];
	}
	elseif ($e == 3) {
		$error = $lang_register['mismatch_password'];
	}
	elseif ($e == 4) {
		$error = $lang_register['uname_short'];
	}
	elseif ($e == 5) {
		$error = $lang_register['pass_short'];
	}
	elseif ($e == 6) {
		$error = $lang_register['captcha_incorrect'];
	}
	elseif ($e == 7) {
		$error = $lang_register['username_inuse'];
	}
	elseif ($e == 8) {
		$error = $lang_register['email_inuse'];
	}
}

if (!$allow_creation) {
	redirect("login.php?e=4");
}

if (isset($_POST['register'])) {
	if (empty($_POST['uname']) || empty($_POST['pass']) || empty($_POST['confpass']) || empty($_POST['email'])) {
	     redirect("register.php?e=1");
	}
	else {
	
		$uname = $sqlr->smartquote($_POST['uname']);
		$pass = $sqlr->smartquote($_POST['pass']);
		$confpass = $sqlr->smartquote($_POST['confpass']);
		$email = $sqlr->smartquote($_POST['email']);
		$exp = $sqlr->smartquote($_POST['expansion']);
		$locale = $sqlr->smartquote($_POST['locale']);
		if ($allow_expansion) {
			if ($exp == "Classic") {
				$expansion = 0;
			}
			if ($exp == "TBC") {
				$expansion = 1;
			}
			if ($exp == "WOTLK") {
				$expansion = 2;
			}
		}
		else {
			$expansion = $default_expansion;
		}
		
		if (isset($_POST['captcha'])) { $captcha = $sqlr->smartquote($_POST['captcha']); }

		if ($validate_email) {
			if (!valid_email($email)) {
				redirect("register.php?e=2");
			}
		}

		if ($pass != $confpass) {
			redirect("register.php?e=3");
		}

		if (strlen($uname) < 4 || strlen($uname) > 14) {
			redirect("register.php?e=4");
		}

		if (strlen($pass) < 4 || strlen($pass) > 14) {
			redirect("register.php?e=5");
		}

		if ($require_captcha) {
			if (!validate_captcha($captcha)) {
				redirect("register.php?e=6");
			}
		}
		
		switch ($locale) {
			case "North America":
				$location = 2;
				break;
			case "Oceanic":
				$location = 3;
				break;
			case "Latin America":
				$location = 4;
				break;
			case "Korea":
				$location = 6;
				break;
			case "Thailand":
				$location = 14;
				break;
			case "China":
				$location = 16;
				break;
			default:
				$location = 18;
				break;
		}

		$query = $sqlr->query("SELECT username FROM account WHERE username='$uname'");
		if (mysql_num_rows($query) > 0) {
			redirect("register.php?e=7");
		}
		$query = $sqlr->query("SELECT email FROM account WHERE email='$email'");
		if (mysql_num_rows($query) > 0) {
			redirect("register.php?e=8");
		}
		else {
			$client_ip = $_SERVER['REMOTE_ADDR'];
			if ($email_verify) {
				$authkey = sha1($client_ip . time());
				$password = sha1(strtoupper($uname) . ":" . strtoupper($pass));
				$query = $sqlt->query("INSERT INTO account (username,sha_pass_hash,email, joindate,last_ip,failed_logins,locked,last_login,expansion,authkey,locale)
			  VALUES (UPPER('$uname'),'$password','$email',now(),'$client_ip','0','0',NULL,'$expansion','$authkey','$location')");
				
				redirect("login.php?e=3");
			}
			else {
				$password = sha1(strtoupper($uname) . ":" . strtoupper($pass));
				$query = $sqlr->query("INSERT INTO account (username,sha_pass_hash,email, joindate,last_ip,failed_logins,locked,last_login,expansion,locale)
			  VALUES ('$uname','$password','$email',now(),'$client_ip','0','0',NULL,'$expansion','$location')");
				if ($email_on_create) {
				     send_email("create");
				}
			
				redirect("index.php");
				$_SESSION['uname'] = $uname;
			}
		}
	}
}
		

$output .= '<div class="content center_left">
	<div class="contentbox">
		<div class="contentbox_title">Register</div>
					<div class="contentbox_body">';	
if (isset($error)) {				
	$output .= '<div class="statusmessage failure">'.$error.'</div>';
}
$output .= '	<form method="post" action="register.php">
		<label for="uname" class="login">Username:</label><br />
		<input type="text" name="uname" id="uname" /> Minimum Length: 4 | Maximum Length: 14<br />
		<label for="pass" class="login">Password:</label><br />
		<input type="password" id="pass" name="pass" /><br />
		<label for="confpass" class="login">Confirm Password:</label><br />
		<input type="password" id="confpass" name="confpass" /> Minimum Length: 4 | Maximum Length: 14<br />
		<label for="email" class="login">Email:</label><br />
		<input type="text" id="email" name="email" /> Valid E-Mail Address Required<br /><br />';
		
		if ($allow_expansion) {
			$output .='
		<select name="expansion">
		  <option>Classic</option>
		  <option>TBC</option>
		  <option>WOTLK</option>
		</select> Account Type<br /><br />';
		}
		$output .= '
		<select name="locale">
		  <option>North America</option>
		  <option>Oceanic</option>
		  <option>Latin America</option>
		  <option>Korea</option>
		  <option>Thailand</option>
		  <option>China</option>
		  <option>Other</option>
		</select> Region<br /><br />';
if ($require_captcha) {
$output .= '	<input type="text" name="captcha" /> Captcha Image<br /><br />';
}
$output .= '	<input type="hidden" name="register" value="1" />
		<input type="submit" value="Register" />
	</form>
</div>
		</div>
	</div>
<div id="clear">
			</div></div>';			   

require_once("footer.php");

echo $output;
?>
		
