<?php
include "connect.php" ;

if(isset($_GET['id'])){
    $id = $_GET['id'] ;

    $query = "DELETE FROM sinhven WHERE id ='$id' ";
    $result = mysqli_query($conn,$query);

    if($result){
        header("location:read.php");
        echo "xoá thành công" ;
    }else{
        echo "Invalid query :" . $conn->error;
    }
    
}
mysqli_close($conn);
?>
