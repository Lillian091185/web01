<?php

include_once "../base.php";

$bottom = find("bottom",1);

$new = $_POST['bottom'];

$bottom['bottom'] = $new;

save("bottom",$bottom);

to("../admin.php?do=bottom");


?>