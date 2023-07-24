<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kq = "";
  $dulieu = $_POST['dulieu'];
  function xuly($chuoi)
  { $_POST['dulieu'];
    $s = chunk_split($chuoi, 2, ":");
    return substr($s, 0, strlen($s) - 1);
  }
  xuly($dulieu);
  $kq =  xuly($dulieu);


  $b = "";
  $string = "Twinkle, twinkle, little star,\nHow I wonder what you are.\nUp above the world so high,\nLike a diamond in the sky.";
  function a($string)
  {
    $array = explode("\n", $string);
    echo '<pre>';
    $kq2 = var_dump($array);
    echo '</pre>';
   
  }
  $b = a($string);
}
