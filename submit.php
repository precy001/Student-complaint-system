<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student complaint system</title>
    <link rel="stylesheet" href="../frontend/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <center>
    <div class="icon"><img src="../frontend/yabateh_logo-removebg-preview.png" width="80" height="80"></div>
    </center>
    <div class="title">Student Complaint System</div>
    <form action="../Backend/submit.php" method="post" class="container">
        <input type="text" class="matric" placeholder="Matric-No" name="matric-no" required>
        <input type="text" class="name" placeholder="Fullname" name="username" required>
        <input type="text" class="name" placeholder="Email adress" name="email" required>
        <div class="note">Type your complaint here</div>
        <textarea  name="message"  class="message" required></textarea>
        <input type="submit" value="Submit" name="submit" class="submit">
    </form>
</body>
</html>
   <?php



if(isset($_POST['submit'])){
    $matric_no = $_POST['matric-no'];
$username = $_POST['username'];
$email = $_POST['email'];
$complaint = $_POST['message'];
   
   require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
   require 'PHPMailer-5.2-stable/class.phpmailer.php';
   require 'PHPMailer-5.2-stable/class.smtp.php';
   
   
  
   
   $mail = new PHPMailer;
   
   //$mail->SMTPDebug = 3;                               // Enable verbose debug output
   
   $mail->isSMTP();                                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;                               // Enable SMTP authentication
   $mail->Username = 'oluseyefavour5@gmail.com';                 // SMTP username
   $mail->Password = 'payzjxesrzknvljo';                           // SMTP password
   $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 465;                                    // TCP port to connect to
   
   $mail->setFrom('oluseyefavour5@gmail.com', 'Oluseye favour');
   $mail->addAddress('boluwatifeiyiade@gmail.com', 'User');     // Add a recipient
  /*  $mail->addAddress('ellen@example.com');               // Name is optional
   $mail->addReplyTo('info@example.com', 'Information');
   $mail->addCC('cc@example.com');
   $mail->addBCC('bcc@example.com');
   
   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');  */   // Optional name
   $mail->isHTML(true);                                  // Set email format to HTML
   
   $mail->Subject = 'New Complaint';
   $mail->Body    = "Username: $username.<br>Matri-No.: $matric_no.<br>Email adress: $email.<br>Complaint: $complaint";
   $mail->AltBody = "Username: $username.<br>Matri-No.: $matric_no.<br>Email adress: $email.<br>Complaint: $complaint";
        $mail->send();
        header('Location: ..\frontend\confirmation.html');
}
?>
