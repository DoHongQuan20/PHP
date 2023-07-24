<?php
function countToFive()
{
    yield 1;
    yield from [2, 3, 4];
    yield 5;
}
foreach (countToFive() as $v)
    echo $v; //12345
?>
