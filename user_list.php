<?php
include_once 'db_connect.php';
include_once 'functions.php';

$users = getUsers($mysqli);
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="user_list.css">
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="user_list.js"></script>
		<title>User Listing</title>
	</head>
	<body>
		<table id="headerTable">
			<tr id="headerRow">
				<td id="pageTitle"><span>User List</span></td>
				<td align="right" id="addUserCol"><button id="new-user">Add User</button></td>
			</tr>
		</table>
			
		<table>
			<thead>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Street</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				<th>Date Added</th>
				<th>Gender</th>
				<th>Edit</th>
			</thead>
			<tbody>
				<?php
				for ($i = 0; $i < count($users); $i++) {
					$tr = ($i % 2 == 0) ? '<tr class="even">' : '<tr class="odd">';
					echo($tr);
					echo('<td>'.$users[$i]["id"].
'</td>');
					echo('<td>'.$users[$i]["fname"].
'</td>');
					echo('<td>'.$users[$i]["lname"].
'</td>');
					echo('<td>'.$users[$i]["email"].
'</td>');
					echo('<td>'.$users[$i]["phone"].
'</td>');
					echo('<td>'.$users[$i]["street"].
'</td>');
					echo('<td>'.$users[$i]["city"].
'</td>');
					echo('<td>'.$users[$i]["state"].
'</td>');
					echo('<td>'.$users[$i]["zip"].
'</td>');
					echo('<td>'.date('m/d/Y', strtotime($users[$i]["date"])).
'</td>');
					echo('<td>'.(($users[$i]["gender"]) === 'm' ? 'Male' : 'Female').
'</td>');
					echo('<td><button class="editUser" id="edit-user'.$users[$i]["id"].'">Edit</button>'.'</td>');
					echo('</tr>');
				}
				?>
			</tbody>
		</table>
	</body>
</html>
