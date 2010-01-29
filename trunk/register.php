<?php
require_once("header.php");
$output = '';

//#############################################
//## START AUTHENTICATION
//#############################################

// If already logged in, no need to login again
			   
mysql_connect("localhost","trinity","trinity");
mysql_select_db("realmd");

			   
$output .= '<center><table width="650" border="0" cellpadding="0" cellspacing="0" class="surround">
  <tr>
    <td width="100%" class="login"><div style="color: #F00; font-size: 12px; font-weight: bold;">REGISTER AN ACCOUNT</div>
      <table width="95%" border="0" cellspacing="0" cellpadding="0" class="loginbox">
      <tr>
        <td class="login"><form method="post" action="register.php">
            <label for="uname" class="login">Username:</label>
            <br /><input type="text" name="uname" id="uname" /> 
            Minimum Length: 4 | Maximum Length: 14<br />
            <label for="pass" class="login">Password:</label>
            <br /><input type="password" id="pass" name="pass" /><br />
            <label for="confpass" class="login">Confirm Password:</label>
            <br /><input type="password" id="confpass" name="confpass" /> 
            Minimum Length: 4 | Maximum Length: 14<br />
            <label for="email" class="login">Email:</label>
            <br /><input type="password" id="email" name="email" /> 
            Valid E-Mail Address Required<br />
            <br />
            <select name="expansion">
              <option>Classic</option>
              <option>TBC</option>
              <option>WOTLK</option>
            </select> 
            Account Type<br /> <br />
            <input type="textbox" name="captcha" /> 
            Captcha Image<br />
            <br />
            <input type="hidden" name="register" value="1" />
            <input type="submit" value="Register" />
          </p>
        </form></td>

      </tr>
    </table></td>
  </tr>
</table>';

echo $output;

require_once("footer.php");

?>
		
