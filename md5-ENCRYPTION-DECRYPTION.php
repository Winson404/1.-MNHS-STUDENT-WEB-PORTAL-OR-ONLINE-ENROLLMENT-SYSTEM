    <?php
        $var = "mnhs";
        echo md5($var);
    ?>
<br>
    <?php
        $encode = base64_encode($var);
        echo base64_encode($var);
    ?> 
<br>
    <?php
        echo base64_decode($encode);
    ?> 