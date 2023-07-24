<?php
$nhanvien = array(0,0,0,"Nam", "Bac", "Trung", "Dong");
echo 'Chieu dai mang la' . sizeof($nhanvien);
print "<br>";
echo 'Vi tri 2 trong mang la: ' . $nhanvien[2];
print "<br>";
for ($i = 0; $i < sizeof($nhanvien); $i++) {
    print($nhanvien[$i]);
}
$quan = "quan";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .chan {
            background-color: yellow;

        }

        .le {
            background-color: greenyellow;

        }
    </style>

</head>

<body>
    <table border="1px">
        <tr>
            <td>STT</td>
            <td>Ten</td>
            <td></td>
            <td><?php echo $quan ;?></td>
        </tr>
        
        <?php
        for ($i = 3; $i < sizeof($nhanvien); $i++) {
            
            if ($i % 2 == 0) { ?>
                <tr class="chan">
                    <td><?php print($i); ?></td>
                    <td><?php print($nhanvien[$i]); ?></td>
                    <td><img onclick="info('<?php echo $nhanvien[$i] ?>')" src="img/document-edit-flat.png" alt="" width="20px" height="20px"></td>
                    <td><?php echo $quan ;?></td>
                </tr>
            <?php
            } else { ?>
                <tr class="le">
                    <td><?php print($i); ?></td>
                    <td><?php print($nhanvien[$i]); ?></td>
                    <td><img onclick="info('<?php echo $nhanvien[$i] ?>')" src="img/document-edit-flat.png" alt="" width="20px" height="20px"></td>
                    <td><?php echo $quan ;?></td>
                <tr>
            <?php }
            ?>
        <?php }
        ?>
         
    </table>
    <script>
        function info(ten) {
            alert(ten);
        }
    </script>

</body>

</html>