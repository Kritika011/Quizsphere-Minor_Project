<?php
require("connection.php");

if(isset($_GET['email']) &&  isset($_GET['ver_code']))
{
    $query="SELECT * FROM `student` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[ver_code]'";
    $result=mysqli_query($conn,$query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['is_verified']==0)
            {
               $update="UPDATE `student` SET `is_verified`='1' WHERE `email`='$result_fetch[email]'";
               if(mysqli_query($conn,$update)){

                echo "
                <script>
                  alert('Email verification successful');
                  window.location.href='student_sign.php';
                </script> ";

               }else{
                echo "
                <script>
                  alert('Cannot Run Query');
                  window.location.href='student_sign.php';
                </script> ";
               }
            }else{
                echo "
                <script>
                   alert('Email already registered');
                   window.location.href='reg.php';
               </script> ";
            }
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