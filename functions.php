<?php
	include_once 'db_connect.php';
	
	function getUsers($mysqli) {
		$userId = -1;
		$fname = "";
		$lname = "";
		$email = "";
		$phone = "";
		$dateAdded = "";
		$gender = "";
		$addrId = -1;
		$street = "";
		$city = "";
		$state = "";
		$zip = "";
		
		$prepStmtGetUsers = "SELECT * FROM users";
		$stmtGetUsers = $mysqli->prepare($prepStmtGetUsers);
		if ($stmtGetUsers) {
			$users = array();
			$stmtGetUsers->execute();
			$stmtGetUsers->store_result();
			$stmtGetUsers->bind_result($userId, $fname, $lname, $email, $phone, $dateAdded, $gender, $street, $city, $state, $zip);
			while ($stmtGetUsers->fetch()) {
				$arr = array("id" => $userId, "fname" => $fname, "lname" => $lname, "email" => $email, "phone" => $phone, "date" => $dateAdded, "gender" => $gender, "street" => $street, "city" => $city, "state" => $state, "zip" => $zip);
				array_push($users, $arr);
			}
			$stmtGetUsers->close();
		}
		return $users;
	}

	function getUserInfo($userId, $mysqli) {
                $usrId = -1;
		$fname = "";
                $lname = "";
                $email = "";
                $phone = "";
                $dateAdded = "";
                $gender = "";
                $addr = "";
                $city = "";
                $state = "";
                $zip = "";
		
		$prepStmtGetUsers = "SELECT * FROM users WHERE id = ?";
                $stmtGetUsers = $mysqli->prepare($prepStmtGetUsers);
                if ($stmtGetUsers) {
                        $userInfo = array();
			$stmtGetUsers->bind_param('i', $userId);
                        $stmtGetUsers->execute();
                        $stmtGetUsers->store_result();
                        $stmtGetUsers->bind_result($usrId, $fname, $lname, $email, $phone, $dateAdded, $gender, $addr, $city, $state, $zip);
                        while ($stmtGetUsers->fetch()) {
                                $arr = array("id" => $usrId, "fname" => $fname, "lname" => $lname, "email" => $email, "phone" => $phone, "date" => $dateAdded, "gender" => $gender, "street" => $addr, "city" => $city, "state" => $state, "zip" => $zip);
                                array_push($userInfo, $arr);
                        }
                        $stmtGetUsers->close();
                }
                return $userInfo;
	}

	function addUser($fname, $lname, $email, $phone, $gender, $street, $city, $state, $zip, $mysqli) {
		$prepStmtAddUser = "INSERT INTO users (fname, lname, email, phone, gender, addr, city, state, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmtAddUser = $mysqli->prepare($prepStmtAddUser);
		if ($stmtAddUser) {
			$stmtAddUser->bind_param('sssssssss', $fname, $lname, $email, $phone, $gender, $street, $city, $state, $zip);
			$userId = -1;
			$prepStmtGetUserId = "SELECT LAST_INSERT_ID()";
			$stmtGetUserId = $mysqli->prepare($prepStmtGetUserId);
			$stmtAddUser->execute();
			if ($stmtGetUserId) {
                                $stmtGetUserId->execute();
                                $stmtGetUserId->store_result();
                                $stmtGetUserId->bind_result($userId);
                                $stmtGetUserId->fetch();
                                $stmtGetUserId->close();
				echo($userId);
                        }
			$stmtAddUser->close();
		}
	}

	function updateUser($id, $fname, $lname, $email, $phone, $gender, $street, $city, $state, $zip, $mysqli) {
		$prepStmtUpdateUser = "UPDATE users SET fname = ?, lname = ?, email = ?, phone = ?, gender = ?, addr = ?, city = ?, state = ?, zip = ? WHERE id = ?";
		$stmtUpdateUser = $mysqli->prepare($prepStmtUpdateUser);
		if ($stmtUpdateUser) {
			$stmtUpdateUser->bind_param('sssssssssi', $fname, $lname, $email, $phone, $gender, $street, $city, $state, $zip, $id);
			$stmtUpdateUser->execute();
			$stmtUpdateUser->close();
		}
	}

	function removeUser($id, $mysqli) {
		$prepStmtDeleteUser = "DELETE FROM users WHERE id = ?";
		$stmtDeleteUser = $mysqli->prepare($prepStmtDeleteUser);
		if ($stmtDeleteUser) {
			$stmtDeleteUser->bind_param('i', $id);
			$stmtDeleteUser->execute();
			$stmtDeleteUser->close();
		}
	}
?>
