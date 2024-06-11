<?php
include('../../connect.php');
include('../../customFunc.php');

$id = $_POST['id'];

$data = [];

$result = fetchOtherdetails($con, 'city', 'country_id', $id);

while ($sh = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'id' => $sh['Id'],
        'name' => $sh['name']
    );
}

header("Content-Type:application/json");
echo json_encode($data);
