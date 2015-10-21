<?php
include_once 'db_connect.php';
include_once 'functions.php';
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="edit_user.css">
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="edit_user.js"></script>
		<title>Add/Edit User</title>
	</head>
	<body>
		<?php
			parse_str($_SERVER['QUERY_STRING']);
			if ($action == "add") {
				echo('<h1>Add User</h1>');
			} else if ($action == "edit") {
				echo('<h1>Edit User</h1>');
				$userInfo = getUserInfo($id, $mysqli);
			}
		?>
		<form id="userDataForm">
			<table>
				<tr>
					<td><span class="inputTitle">First Name</span></td>
					<td><input id="fname" name="fname" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["fname"].'"') ?>></input></td>
				</tr>
				<tr>
					<td><span class="inputTitle">Last Name</span></td>
					<td><input id="lname" name="lname" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["lname"].'"') ?>></input></td>
				</tr>
				<tr>
                                        <td><span class="inputTitle">Email</span></td>
                                        <td><input id="email" name="email" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["email"].'"') ?>></input></td>
                                </tr>
				<tr>
                                        <td><span class="inputTitle">Phone</span></td>
                                        <td><input id="phone" name="phone" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["phone"].'"') ?>></input></td>
                                </tr>
				<tr>
                                        <td><span class="inputTitle">Street</span></td>
                                        <td><input id="street" name="street" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["street"].'"') ?>></input></td>
                                </tr>
				<tr>
                                        <td><span class="inputTitle">City</span></td>
                                        <td><input id="city" name="city" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["city"].'"') ?>></input></td>
                                </tr>
				<tr>
                                        <td><span class="inputTitle">State</span></td>
                                        <td><input id="state" name="state" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["state"].'"') ?>></input></td>
                                </tr>
				<tr>
                                        <td><span class="inputTitle">Zip</span></td>
                                        <td><input id="zip" name="zip" type="text" <?php if ($action == "edit") echo('value="'.$userInfo[0]["zip"].'"') ?>></input></td>
                                </tr>
				<tr>
					<td><span class="inputTitle">Gender</span></td>
					<td><input id="radioM" name="sex" type="radio" value="m" <?php if ($action == "edit" && $userInfo[0]["gender"] == "m") echo('checked="checked"') ?>>Male</input><input id="radioF" name="sex" type="radio" value="f" <?php if ($action == "edit" && $userInfo[0]["gender"] == "f") echo('checked="checked"') ?>>Female</input></td>
				</tr>
				<tr>
					<?php
					if ($action == "add")
						echo('<td><input id="submitAddUser" type="submit" value="Add User"></input></td>');
					else
						echo('<td><input id="submitSaveChanges" type="submit" value="Save Changes"></input></td>');
					?>
					<td><input id="btnReset" type="reset" value="Reset"></input></td>
				</tr>
				<?php
					if ($action == "edit")
						echo('<tr><td><button id="btnRemove">Remove User</button></td></tr>');
				?>
			</table>
		</form>
	</body>
</html>
