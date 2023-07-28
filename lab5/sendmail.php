<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //nhúng file để sử dụng cấu hình 
    include 'mail/process_send_mail.php';
    //xử lý form submit
    if (isset($_POST['submit'])) {
        //lấy giá trị tùe form
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        //gửi mail
        if (send_email($to, $subject, $message)) {
            echo "Đã gửi mail thành công";
        } else {
            echo "Gửi mail thất bại";
        }
    }
    ?>
    <h2>Form gửi email</h2>
    <form action="" method="post">
        <label for="to">Người Nhận</label><br>
        <input type="text" name="to" id="to" require><br><br>
        <label for="subject">Tiêu đề :</label><br>
        <input type="text" name="subject" id="subject" require><br><br>
        <label for="message">Nội dung :</label><br>
        <textarea name="message" id="message" cols="30" rows="10"></textarea> <br>
        <input type="submit" name="submit" value="Gửi Email">
    </form>
</body>

</html>