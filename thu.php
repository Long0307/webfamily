<?php
    echo $tring = (string)"Controller/customer/Facebook\Facebook.php";

    // echo gettype($string);

    $arr = explode("\\", $tring);

    echo count($arr);

    $link = $arr[0];

    for ($i=1; $i < count($arr); $i++) { 
      echo $link .= "/".$arr[$i];
    }

    // echo $link = $arr[0]."/".$arr[1];

?>