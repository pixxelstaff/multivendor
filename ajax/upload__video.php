<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $video__name = $_FILES['video']['name'];
    $video__tmp__name = $_FILES['video']['tmp_name'];
    $video = $_FILES['video']['type'];
    
    if(!empty($video__name)){
        echo "working fine";
    }
    else{
        echo "error coming";
    }
}