<?php
include_once "../base.php";

$table=$_POST['table'];

foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        del($table,$id);
    }else{

        $data=find($table,$id);

        switch($table){
            case "title":
                $data['text']=$_POST['text'][$key];
                $data['sh']=($id==$_POST['sh'])?1:0;
            break;
            case "admin":
                $data['acc']=$_POST['acc'][$key];
                $data['pw']=$_POST['pw'][$key];                
            break;
            case "menu":
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;                  
            break;
            default:
                $data['text']=$_POST['text'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
        }

        save($table,$data);
    }
}

to("../admin.php?do=$table");

?>
