<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Headers, Authorization, X-Requested-With');
// Since we are inserting data we pass two extra headers.
// 1st allow us to set the method of insert. i.e. POST in rest api
// 2nd determines which type of headers can be sent. It's a secuirty header.
// 'Authorization' is set for authorizing insert data. While 'X-Requested-With' is set for passing data as json
$data = json_decode(file_get_contents("php://input"), true);

                        $bookname= $data['name'];
			$authors=$data['authors'];
			$edition=$data['edition'];
			$status=$data['status'];
			$quantity=$data['quantity'];

include 'config.php';

$sql = "insert into books (name, authors, edition, status, quantity) values ('$bookname', '$authors', '$edition', '$status', '$quantity')";
if (mysqli_query($conn, $sql)) {
  echo json_encode(['msg' => 'Data Inserted Successfully!', 'status' => true]);
} else {
  echo json_encode(['msg' => 'Data Failed to be Inserted!', 'status' => false]);
}
?>