<?php
include('../connect.php');
include('../customFunc.php');
header('Content-Type:application/json');
$id = $_POST['id'];
$data = [];
if($_POST['id'] != ''){

    $area = fetchOtherdetails($con,'area','city_id',$id);

    if(mysqli_num_rows($area) > 0){
        while($sh = mysqli_fetch_assoc($area)){
            $data[] = array('id'=>$sh['Id'],'name'=>$sh['name']);  
        }
        echo json_encode(array('status_define'=>'success','message'=>'successfully fetch areas','data'=>$data));
    }
    else{
        echo json_encode(array('status_define'=>'error','message'=>'data not found'));
    }

}
else{
    echo json_encode(array('status_define'=>'error','message'=>'invalid id'));
}