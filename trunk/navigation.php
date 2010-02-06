<?php

if (isset($userdata)) {
     $output .= '<div class="menu">
          <ul>
               <li> Realm
               </li>
               <li><select name="realm">';
     $query = $sqlr->query("SELECT name FROM realmlist");
     while ($realms = mysql_fetch_array($query)) {
          if ($realms['name'] == $userdata['realm']) {
               $output .= '<option selected>'.$realms['name'].'</option>';
          }
          else {
               $output .= '<option>'.$realms['name'].'</option>';
	  }
     }
	                        
     $output .= '</select></li>
                        </ul>
						<ul>
						<li><a href="logout.php">Logout</a></li>
						</ul>
                    </div>';

}
$output .= '<div class="menu">
		<ul>
			<li> Main
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="users.php">Accounts</a></li>
					<li><a href="chars.php">Characters</a></li>
					<li><a href="forums.php">Forums</a></li>
					<li><a href="chat.php">Live Chat</a></li>
				</ul>
			</li>
			<li> Database
				<ul>
					<li><a href="">Items</a></li>
					<li><a href="">Auction House</a></li>
				</ul>
			</li>
			<li> Tools
				<ul>
					<li><a href="motd.php">MOTD</a></li>
					<li><a href="realmlist.php">Realm List</a></li>
				</ul>
			</li>
			<li> Admin
				<ul>
					<li><a href="">Realm Settings</a></li>
					<li><a href="">Server Settings</a></li>
					<li><a href="">Server Controls</a></li>
				</ul>
			</li>
		</ul>
	</div>';


?>