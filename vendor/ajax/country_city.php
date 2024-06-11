<?php
include('../../connect.php');
include('../../customFunc.php');

$country_id = $_POST['countryId'];

$data = $cityData = [];

$country = fetchOtherdetails($con, 'country', 'Id', $country_id);

$city = fetchOtherdetails($con, 'city', 'country_id', $country_id);

while ($show = mysqli_fetch_assoc($city)) {
    $cityData[] = array(
        'id' => $show['Id'],
        'name' => $show['name']
    );
}

$data = array(
    'country_code' => mysqli_fetch_assoc($country)['country_code'],
    'city' => $cityData
);

header("Content-Type:application/json");
echo json_encode($data);