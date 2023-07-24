<?php
$s ="hello world" ;
echo $s ;
print "<br>" ;
$s = 'It\'s\n ';
echo $s ;
print "<br>" ;
echo "\n Hello <br> world" ;
print "<br>" ;
echo "\u {00C2A9}" ;
print "<br>" ;
echo "\u{C2A9}" ;
?>

<?php
$a = "hello" ;
$$a = "world" ;
echo "$a ${$a} <br>" ;
?>