<?php
// if($_SERVER["REQUEST_METHOD"]=="POST"){
// $email=$_POST['email'];
// $password=$_POST['password'];
// require_once "connection.php";
// $sql = "SELECT * FROM signup WHERE email = '$email'";
// $result = mysqli_query($conn, $sql);
// $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
// if ($user) 
// {
//     if (password_verify($password, $user['password'])) {
//         echo "login success ! ";
//     }else{
//         echo "password does not match";
//     }
// }else{
//         echo "Email does not match";
//     }
// }
?>

<?php
require('connection.php');

session_start();

if(isset($_POST['signin'])){
  $query = "SELECT * FROM `student` WHERE `email`='$_POST[email]'";
  $result=mysqli_query($conn, $query);

  if($result){
      if(mysqli_num_rows($result)==1){

        $result_fetch=mysqli_fetch_assoc($result);
        if(password_verify($_POST['password'],$result_fetch['password'])){
            # if password matched
            $_SESSION['logged_in']=true;
            $_SESSION['email']=$result_fetch['email'];
            header("location: reg.php");

        }else{
            # if password not matched
            echo "
           <script>
             alert('Password does not match');
             window.location.href='student_sign.php';
          </script> ";
        }

      }else{
        echo "
           <script>
             alert('Email not registered');
             window.location.href='student_sign.php';
          </script> ";
      }
  }else{
    echo "
      <script>
           alert('Cannot Run Query');
           window.location.href='student_sign.php';
      </script> ";
  }

}
?>