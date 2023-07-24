<?php
$say = function ($name) {
    echo "Hello" . $name;
};
$say("Wolrd"); //hello world
function myCaller($myCallback)
{
    echo $myCallback();
}
//"hello"
myCaller(function () {
    echo "Hello";
});

$a = array(1, 2, 3, 4, 5);
$b = array_map(function ($n) {
    return $n * $n * $n;
}, $a);
print_r($b);

?>
