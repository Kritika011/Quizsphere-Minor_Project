<?php require('connection.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <div class="form-box">

        <div class="button-box">
            <div id="col-btn"></div>


            <button type="button" class="btn" onclick="login()">Sign in</button>
            <button type="button" class="btn" onclick="signup()">Sign up</button>
        </div>

        <form id="log-in" class="input-group" action="signin.php" method="POST">
          <form id="log-in" class="input-group">

            <input type="email" class="input-field" placeholder="Email" name="email" required>
            <input type="password" class="input-field" placeholder="Password" name="password" required>
            <p align ="right"><a href="#">Forget Password</a></p>
            <button type="submit" class="submit-btn" name="signin" >Sign in</button>
            <pre>Doesn't have an account? <a href="#">Sign up</a></pre>
          </form>
        </form> 
        
        <form id="sign-up" class="input-group" action="signup.php" method="POST">
            <form id="sign-up" class="input-group">

               <input type="text" class="input-field" placeholder="Full name" name="fullname" required>
               <input type="email" class="input-field" placeholder="Email Address" name="email" required>
               <input type="password" class="input-field" placeholder="Password" name="password" required>
               <input type="password" class="input-field" placeholder="Confirm Password" name="conpassword" required>
               <input type="text" class="input-field" placeholder="Your Role" name="role" required>
               <button type="submit" class="submit-btn" name="signup">Sign up</button>
               <pre>Already have an account?<a href="#">Sign in</a></pre>
          </form>

        </form>

    </div>

    <?php
        // if(isset($_SESSION['logged_in'])){
        //     echo"<h1 style='text-align:center;'>WELCOME TO QUIZSPHERE  $_SESSION[email]</h1>";
        // }
    ?>

    <script>

        var x = document.getElementById("log-in");
        var y = document.getElementById("sign-up");
        var z = document.getElementById("col-btn");

        function signup(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";

        }

        function login(){
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";


        }
    </script>


    
</body>
</html>