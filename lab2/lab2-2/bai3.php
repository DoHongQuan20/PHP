<?php
$fruit = array("apple","banana", "orange", "grapes");
foreach ($fruit as $fruit){
    echo $fruit;
    echo "<br>" ;
}

$employee = array ('name' => 'John Smith', 'age' => 30 , 'profession');
foreach($employee as $key => $value){
    echo sprintf("%s: %s <br> ", $key ,$value);
    echo "<br>" ;

}
?>