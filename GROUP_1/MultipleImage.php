<?php
$gallery1img = $_FILES["gallery1image"];
$gallery1imgName = $_FILES["gallery1image"]['name'];
$gallery1imgSize = $_FILES["gallery1image"]['size'];
$gallery1imgTmp = $_FILES["gallery1image"]['tmp_name'];
$gallery1imgType = $_FILES["gallery1image"]['type'];
$gallery1imgError = $_FILES["gallery1image"]['error'];
$gallery1imgExt = explode('.', $gallery1imgName);
$gallery1imgActualExt = strtolower(end($gallery1imgExt));
$allowed = array('jpg', 'jpeg', 'png');
if(in_array($gallery1imgActualExt, $allowed)){
    if($gallery1imgError === 0){
        if($gallery1imgSize < 1000000000000){
            $gallery1imgNew = uniqid('', true).".".$gallery1imgActualExt;
            $fileDestination = 'ColNewsImages/'.$gallery1imgNew;
            move_uploaded_file($gallery1imgTmp, $fileDestination);
        }   else{
            echo"<script> alert('File is too big!') </script>";
        }
    } else{
        echo"<script> alert('There was an error while uploading your image.') </script>";
    }
}

$gallery2img = $_FILES["gallery2image"];
    $gallery2imgName = $_FILES["gallery2image"]['name'];
    $gallery2imgSize = $_FILES["gallery2image"]['size'];
    $gallery2imgTmp = $_FILES["gallery2image"]['tmp_name'];
    $gallery2imgType = $_FILES["gallery2image"]['type'];
    $gallery2imgError = $_FILES["gallery2image"]['error'];
    $gallery2imgExt = explode('.', $gallery2imgName);
    $gallery2imgActualExt = strtolower(end($gallery2imgExt));
    if(in_array($gallery2imgActualExt, $allowed)){
        if($gallery2imgError === 0){
            if($gallery2imgSize < 1000000000000){
                $gallery2imgNew = uniqid('', true).".".$gallery2imgActualExt;
                $fileDestination = 'ColNewsImages/'.$gallery2imgNew;
                move_uploaded_file($gallery2imgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

    $gallery3img = $_FILES["gallery3image"];
    $gallery3imgName = $_FILES["gallery3image"]['name'];
    $gallery3imgSize = $_FILES["gallery3image"]['size'];
    $gallery3imgTmp = $_FILES["gallery3image"]['tmp_name'];
    $gallery3imgType = $_FILES["gallery3image"]['type'];
    $gallery3imgError = $_FILES["gallery3image"]['error'];
    $gallery3imgExt = explode('.', $gallery3imgName);
    $gallery3imgActualExt = strtolower(end($gallery3imgExt));
    if(in_array($gallery3imgActualExt, $allowed)){
        if($gallery3imgError === 0){
            if($gallery3imgSize < 1000000000000){
                $gallery3imgNew = uniqid('', true).".".$gallery3imgActualExt;
                $fileDestination = 'ColNewsImages/'.$gallery3imgNew;
                move_uploaded_file($gallery3imgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

    $gallery4img = $_FILES["gallery4image"];
    $gallery4imgName = $_FILES["gallery4image"]['name'];
    $gallery4imgSize = $_FILES["gallery4image"]['size'];
    $gallery4imgTmp = $_FILES["gallery4image"]['tmp_name'];
    $gallery4imgType = $_FILES["gallery4image"]['type'];
    $gallery4imgError = $_FILES["gallery4image"]['error'];
    $gallery4imgExt = explode('.', $gallery4imgName);
    $gallery4imgActualExt = strtolower(end($gallery4imgExt));
    if(in_array($gallery4imgActualExt, $allowed)){
        if($gallery4imgError === 0){
            if($gallery4imgSize < 1000000000000){
                $gallery4imgNew = uniqid('', true).".".$gallery4imgActualExt;
                $fileDestination = 'ColNewsImages/'.$gallery4imgNew;
                move_uploaded_file($gallery4imgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

    $gallery5img = $_FILES["gallery5image"];
    $gallery5imgName = $_FILES["gallery5image"]['name'];
    $gallery5imgSize = $_FILES["gallery5image"]['size'];
    $gallery5imgTmp = $_FILES["gallery5image"]['tmp_name'];
    $gallery5imgType = $_FILES["gallery5image"]['type'];
    $gallery5imgError = $_FILES["gallery5image"]['error'];
    $gallery5imgExt = explode('.', $gallery5imgName);
    $gallery5imgActualExt = strtolower(end($gallery5imgExt));
    if(in_array($gallery5imgActualExt, $allowed)){
        if($gallery5imgError === 0){
            if($gallery5imgSize < 1000000000000){
                $gallery5imgNew = uniqid('', true).".".$gallery5imgActualExt;
                $fileDestination = 'ColNewsImages/'.$gallery5imgNew;
                move_uploaded_file($gallery5imgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

    $gallery6img = $_FILES["gallery6image"];
    $gallery6imgName = $_FILES["gallery6image"]['name'];
    $gallery6imgSize = $_FILES["gallery6image"]['size'];
    $gallery6imgTmp = $_FILES["gallery6image"]['tmp_name'];
    $gallery6imgType = $_FILES["gallery6image"]['type'];
    $gallery6imgError = $_FILES["gallery6image"]['error'];
    $gallery6imgExt = explode('.', $gallery6imgName);
    $gallery6imgActualExt = strtolower(end($gallery6imgExt));
    if(in_array($gallery6imgActualExt, $allowed)){
        if($gallery6imgError === 0){
            if($gallery6imgSize < 1000000000000){
                $gallery6imgNew = uniqid('', true).".".$gallery6imgActualExt;
                $fileDestination = 'ColNewsImages/'.$gallery6imgNew;
                move_uploaded_file($gallery6imgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

?>