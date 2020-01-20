<?php

include_once "../base.php";

$table = $_POST['table'];

if(!empty($_FILES['file']['tmp_name'])){
    $data['file']=$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$data['file']);
}

switch($table){
    case "admin":
        if(!empty($_POST['acc']) && !empty($_POST['pw'])){
            $data['acc']=$_POST['acc'];
            $data['pw']=$_POST['pw'];
        }
    break;
    case "menu":
        if(!empty($_POST['text']) && !empty($_POST['href'])){
            $data['text']=$_POST['text'];
            $data['href']=$_POST['href'];
        }
    break;
    default:
        if(!empty($_POST['text'])){
            $data['text']=$_POST['text'];
        }
}

    save($table,$data);
    to("../admin.php?do=$table");

?>
