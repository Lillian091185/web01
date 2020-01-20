<?php
include_once "../base.php";

$total=find("total",1);

$new=$_POST['total'];

$total['total']=$new;

$_SESSION['total']=$new;

save("total",$total);

to("../admin.php?do=total");

?>