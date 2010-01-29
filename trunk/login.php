<?php
require_once("header.php");
$output = '';

//#############################################
//## START AUTHENTICATION
//#############################################

// If already logged in, no need to login again
			   			   
if (isset($userdata)) {
     redirect("index.php");
}
else { // Now start the authentication

     if (isset($_GET['e'])) {
          $error = $_GET['e'];
     }

     $_SESSION['login_user'] = (isset($_POST['uname'])) ? $_POST['uname']:"";
     $_SESSION['login_remember'] = (isset($_POST['remember_login'])) ? 'checked':'unchecked';
     $_SESSION['login_realm'] = (isset($_POST['realm'])) ? $_POST['realm']:NULL;  

     echo $_SESSION['login_remember'];

     if (isset($_POST['login'])) {          
          
          if (empty($_POST['uname']) && empty($_POST['pass'])) {
               redirect("login.php?e=2");
          }
          else {
               $uname = strtoupper($sqlr->smartquote($_POST['uname']));
               $pass1 = strtoupper($sqlr->smartquote($_POST['pass']));
			   $pass = sha1($uname .":". $pass1);
               $realm = $sqlr->smartquote($_POST['realm']);

               $query = $sqlr->query("SELECT * FROM account WHERE username=UPPER('$uname') AND sha_pass_hash='$pass'");
               
               if ($sqlr->num_rows($query) < 1) {
                    redirect("login.php?e=1");
               }
               else {
                    $_SESSION['uname'] = $uname;
                    $_SESSION['realm'] = $realm;
                    if (isset($_POST['remember_login'])) {
                         $_COOKIE['uname'] = $uname;
                    }
                    redirect("index.php");
               }
          }
     }
}

// Time to display the login form.

$output .= '<center>';

if (!empty($error)) {
     if ($error == 1) {
	$output .= '<div id="error">'.$lang_login['incorrect_values'].'</div><br />';
     }
     elseif ($error == 2) {
        $output .= '<div id="error">'.$lang_login['blank_fields'].'</div><br />';
     }
     elseif ($error == 3) {
        $output .= '<div id="error">'.$lang_login['requires_auth'].'</div><br />';
     }
}

$output .= '<table width="650" border="0" cellpadding="0" cellspacing="0" class="surround">
  <tr>
    <td width="50%" align="center" valign="top"><p>Welcome to '.$title.'!</p>
      <p><img src="images/locked-icon.png" width="101" height="91" /></p>
    <p>Use a valid account username and password to log into the management system.</p></td>
    <td width="50%" class="login"><div style="color: #F00; font-size: 12px; font-weight: bold;">LOGIN</div>
      <table width="95%" border="0" cellspacing="0" cellpadding="0" class="loginbox">
      <tr>
        <td class="login"><form method="post" action="login.php"><label for="uname" class="login">Username:</label><br /><input type="text" name="uname" id="uname" value="'.$_SESSION['login_user'].'" /><br /><label for="pass" class="login">Password:</label><br /><input type="password" id="pass" name="pass" /><br />
        <select name="realm">';
	$query = $sqlr->query("SELECT name FROM realmlist ORDER BY name ASC");
        while ($realms = mysql_fetch_array($query)) {
                if ($realms['name'] == $_SESSION['login_realm']) {
                     $output .= '<option selected>'.$realms['name'].'</option>';
                }
                else {
		     $output .=' <option>'.$realms['name'].'</option>';
                }
	}
$output .= '</select> Realm<br />
        <input type="checkbox" name="remember_login" '.$_SESSION['login_remember'].' /> Remember Me<br />
        <input type="hidden" name="login" value="1" />
        <input type="submit" value="Login" /></form></td>
      </tr>
    </table></td>
  </tr>
</table>';

// We are going to list the available realms to log in to

echo $output;

require_once("footer.php");

?>
		
