<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $type    = stripslashes($_REQUEST['type']);
        $type   = mysqli_real_escape_string($con, $type);

        $query    = "INSERT into `users` (username, password, email, create_datetime, type ,user_type)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime','$type','2')";
        
       
        $subject = 'Signup welcome mail';
        $message = 'Thanks for signup';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($email, $subject, $message, $headers);



     $secret = '6Lc0gDIaAAAAAGjH8VETfltW4f2-H2qCcSxFtJyS';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success){
        $result   = mysqli_query($con, $query);
        echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";}
        else {
            echo "<div class='form'>
                  <h3>Required fields are missing(Captcha).</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <select style="width:300px;height: 50px; margin-bottom:10px; " name="type" required="required"  >
        <option value=""> Select</option> 
        <option value="education">  education</option> 
        <option value="recreational">recreational  </option> 
        <option value="social">social  </option> 
        <option value="diy"> diy </option> 
        <option value="charity"> charity </option> 
        <option value="cooking">cooking  </option> 
        <option value="relaxation">relaxation  </option> 
        <option value="music"> music </option> 
        <option value="busywork"> busywork </option> 
    </select>
         <div class="g-recaptcha" data-sitekey="6Lc0gDIaAAAAAJkLqs1vn2R5bUNZQhBxJhAxqBRA"></div>
        
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
