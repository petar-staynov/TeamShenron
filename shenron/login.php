<?php
include("db.php");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $myusername = mysqli_real_escape_string($db,$_POST['username']);
   $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
   
   $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
   $result = mysqli_query($db,$sql);
   
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);
   $permission = $row['permissions'];
   

   
		// Check Permissions and redirect
   if($count == 1 && $permission == 4) {
      $_SESSION['myusername'];
      $_SESSION['login_user'] = $myusername;
      header("Location: http://localhost/shenron/layout/schooler/dashboard/welcome.php");
   } else if ($count == 1 && $permission == 3){
      $_SESSION['myusername'];
      $_SESSION['login_user'] = $myusername;
      header("Location: http://localhost/shenron/layout/teacher/dashboard/welcome.php");
   }
   else if ($count == 1 && $permission == 2){
      $_SESSION['myusername'];
      $_SESSION['login_user'] = $myusername;
      header("Location: http://localhost/shenron/layout/head_teacher/dashboard/welcome.php");
   } else {
     $error = "<p class=\"error\">Грешно потребителско име или парола!</p>";
  }
}

?>