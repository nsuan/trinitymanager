<?php
require_once("header.php");

if (empty($userdata)) {
	redirect("login.php");
}

if (!empty($_POST['order_by'])) {
	$order_dir = $sqlr->smartquote($_POST['order_by']);
}
else {
	$order_dir = "ASC";
}

if (!empty($_POST['search_string'])) {
	$search_string = $sqlr->smartquote($_POST['search_string']);
	$query = $sqlr->query("SELECT id,username,online,locale FROM account WHERE username LIKE '%$search_string%' ORDER BY username $order_dir");
}

else {
	$query = $sqlr->query("SELECT id,username,online,locale FROM account ORDER BY username $order_dir");
}

$output .= '
<div class="content center_left">
				<div class="contentbox">
					<div class="contentbox_title">Accounts</div>
					<div class="contentbox_body">
						<div>
							<form name="retrieve" action="" method="post">
							<fieldset>
								Username: <input type="text" name="search_string"/>
								<select name="order_by">
									<option>Asc</option>
									<option>Desc</option>
								</select>
								<input type="submit" value="Filter" />
							</fieldset>
							</form>
						</div>
					<table class="tabular" width="100%">
						<form name="accounts" action="" method="post">
							<tr><th>Name</th><th>Status</th><th>Location</th><th>Del</th><th>Check</th></tr>';
while ($account = $sqlr->fetch_array($query)) {

							$output .= '<tr class="tabular_odd"><td><a href="view_users.php?id='.$account['id'].'">'.$account['username'].'</a></td><td>'.useronline($account['username']).'</td><td>'.userlocation($account['username']).'</td><td><a href="delete_user.php?id='.$account['id'].'"><img src="themes/'.$theme.'/images/delete-icon.png" alt="Delete"/></a></td><td><input type="checkbox" name="del" value="accounts['.$account['username'].']"/></td></tr>';
					
}
$output .= '</table>
					<div id="accounts_bottom"><input type="button" value="Delete"></div>
					</form>
					</div>
				</div>
			</div>
			<div id="clear">
			</div>
		</div>';
		
require_once("footer.php");
echo $output;
		
?>
	



