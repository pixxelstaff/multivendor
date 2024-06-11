<?php

include('../../connect.php');

include('../../customFunc.php');

$id = $_POST['id'];
// $id = 6;

$query = fetchOtherdetails($con, 'category', 'Id', $id);

$category = fetchAllData($con,'category');

$catArray = [];

while($dis = mysqli_fetch_assoc($category)){
    $catArray[] = array(
        'id'=>$dis['Id'],
        'name'=>$dis['name']
    );
}

$data = [];

$parentCategory = '';

while ($sh = mysqli_fetch_assoc($query)) {
    if ($sh['parentId'] != 0) {
        $secondq = fetchOtherdetails($con, 'category', 'Id', $sh['parentId']);
        while ($show = mysqli_fetch_assoc($secondq)) {
            $parentCategory = $show['name'];
        }
    } else {
        $parentCategory = 'no-parent';
    }
    $data[] = array(
        'id' => $sh['Id'],
        'name' => dec_function( $sh['name']),
        'parent_category' => dec_function($parentCategory),
        'p_id' => $sh['parentId'],
        'image' => $sh['image'],
        'des' => $sh['description'],
        'categories'=>$catArray
    );
}

header('Content-Type:application/json');
echo json_encode($data);
