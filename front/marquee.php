<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">

    <?php
        $rows = all("ad",['sh' => 1]);
        foreach($rows as $r){
            echo $r['text'] ."&nbsp;&nbsp;&nbsp;&nbsp";
        }
    ?>

</marquee>