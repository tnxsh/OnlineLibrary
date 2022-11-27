<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// To update is similar to insert. Except in rest api update request is done throough PUT method

$data = json_decode(file_get_contents("php://input"), true);


                        $first=$data['first'];
			$last=$data['last'];
			$username=$data['username'];
			$password=$data['password'];
			$email=$data['email'];
			$contact=$data['contact'];

include 'config.php';

$sql = "update student set first= '$first', last = '$last', username = '$username', password = '$password', email = '$email', contact = '$contact' where email = '$email'";

if (mysqli_query($conn, $sql)) {
  echo json_encode(['msg' => 'Data Updated Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'Data Failed to be Updated!', 'status' => false]);
}

?>