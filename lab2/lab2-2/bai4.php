<?php
echo 'Simple Break';
for ($i = 1 ; $i <= 2 ;$i++){
    echo "\n" . '$i = ' . $i .' ';
    for($j = 1; $j <= 5 ;$j++){
        if($j == 2){
            break;
        }
        echo '$j = '.$j . ' ';

    }

}
print "<br>" ;
/* Simple break
i = 1 j = 2
i = 2 j = 1 */


echo 'Multi-level Break' ;
for($i = 1 ;$i <= 2 ; $i++) {
    echo "\n" . '$i = '. $i. ' ';
    for($j = 1; $j <= 5 ;$j++){
        if($j == 2){
            break 2;
        }
        echo '$j = '.$j . ' ';

    }
}
/*Multi-level Break 
 $i = 1 $j = 1*/

?>