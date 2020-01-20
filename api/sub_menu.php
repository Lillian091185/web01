<?php
    include_once "../base.php";

    $table=$_POST['table'];
    $parent=$_POST['parent'];

    if(!empty($_POST['id'])){
        foreach($_POST['id'] as $key => $id){
            if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
                del($table,$id);
            }else{
                $data = find($table,$id);
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                save($table,$data);
            }
        }
    }

    if(!empty($_POST['text2'])){
        foreach($_POST['text2'] as $key => $text){
            if(!empty($text)){
                $add['text']=$text;
                $add['href']=$_POST['href2'][$key];
                $add['parent']=$parent;
                save($table,$add);
            }
        }
    }

    to("../admin.php?do=$table");
?>