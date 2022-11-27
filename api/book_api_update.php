<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// To update is similar to insert. Except in rest api update request is done throough PUT method

$data = json_decode(file_get_contents("php://input"), true);


                        $bookname= $data['name'];
			$authors=$data['authors'];
			$edition=$data['edition'];
			$status=$data['status'];
			$quantity=$data['quantity'];

include 'config.php';

$sql = "update books set name= '$bookname', authors = '$authors', edition = '$edition', status = '$status', quantity = '$quantity'where authors = '$authors'";

if (mysqli_query($conn, $sql)) {
  echo json_encode(['msg' => 'Data Updated Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'Data Failed to be Updated!', 'status' => false]);
}

?>