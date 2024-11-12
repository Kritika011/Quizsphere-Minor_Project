<?php
//  $fullname=$_POST['fullname'];
//  $email=$_POST['email'];
//  $password=$_POST['password'];
//  $confirm_password=$_POST['conpassword'];
//  $role=$_POST['role'];

//  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

//  $error=array();
//  if (empty($fullname) OR empty($email) OR empty($password) OR empty($confirm_password) OR empty($role) ){
//     array_push($error,"All fields are required");
//  }
//  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     array_push($error,"Email is not valid");
//  }
//  if(strlen($password)<5){
//     array_push($error,"Password must be at least 5 charecter");
//  }
//  if ($password!==$confirm_password) {
//     array_push($error,"Password doesn't match");
//  }

//  require_once "connection.php";
//  $sql = "SELECT * FROM signup WHERE email = '$email'";
//  $result = mysqli_query($conn, $sql);
//  $rowCount = mysqli_num_rows($result);
//  if ($rowCount > 0) {
//     array_push($error , "Email already exixts !");
//  }

//  if(count($error)>0) {
//     foreach ($error as $error) {
//         echo "<div class='alert alert-danger'>$error</div>";
//     }
//  }else{
   
//    $sql = "INSERT INTO signup ( fullname, password, email, role,verification_code,is_verified) VALUES ( ? , ? , ? , ? , ? , ? )";
//    $stmt = mysqli_stmt_init($conn);
//    $prepare_stmt = mysqli_stmt_prepare($stmt,$sql);
//    if ($prepare_stmt) {
//     mysqli_stmt_bind_param($stmt,"ssss",$fullname, $passwordHash, $email, $role);
//     mysqli_stmt_execute($stmt);
//     echo "you are signed up successfully";
//    }else {
//      die("somthing went worng");
//    }

//  }
?>

<?php
require('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $ver_code){
   require ('PHPMailer/PHPMailer.php');
   require ('PHPMailer/SMTP.php');
   require ('PHPMailer/Exception.php');

   $mail = new PHPMailer(true);

   try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'rungshitasarkar1234@gmail.com';                     //SMTP username
      $mail->Password   = 'secret';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('rungshitasarkar1234@gmail.com', 'QuizSphere');
      // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
      $mail->addAddress($email);               //Name is optional
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
  
      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Email verification for signup';
      $mail->Body    = "<b>Thanks for signing up</b>
      Click the link below to verify your email
      <a href='http://localhost/student_signin_up/verify.php?email=$email&ver_code=$ver_code'>Click here</a>";
      
  
      $mail->send();
      return true;
  } catch (Exception $e) 
  {
      return false;
  }
   

}
if(isset($_POST['signup'])){
   $user_exist="SELECT * FROM `student` WHERE `email`='$_POST[email]'";
   $result=mysqli_query($conn,$user_exist);

   if($result)
   {
      if(mysqli_num_rows($result)>0){
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['email']==$_POST['email']){
               echo "
                  <script>
                    alert('Email Already Taken');
                     window.location.href='student_sign.php';
                  </script> ";
            }
      }
      else{#if no one taken the email before
         $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
         $ver_code=bin2hex(random_bytes(16));
         $query="INSERT INTO `student` (`fullname`, `password`, `email`, `role`,`verification_code`, `is_verified`) VALUES ('$_POST[fullname]','$password','$_POST[email]','$_POST[role]','$ver_code','0')";
         if(mysqli_query($conn,$query) && sendMail($_POST['email'],$ver_code)){
            #if data inserted
            echo "
            <script>
               alert('Signup successful');
               window.location.href='student_sign.php';
           </script> ";

         }else{#if data was not inserted
            echo "
           <script>
              alert('Cannot Run Query');
              window.location.href='student_sign.php';
          </script> ";

         }
       }
   }
   else{
      echo "
      <script>
           alert('Cannot Run Query');
           window.location.href='student_sign.php';
      </script> ";
   }
}
?>