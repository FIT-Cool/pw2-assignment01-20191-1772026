<?php

$userDao=new UserDao();
$loginPressed=filter_input(INPUT_POST,'btnLogin');
if (isset($loginPressed)){
    $usnm=filter_input(INPUT_POST,"txtUsername");
    $pwd=filter_input(INPUT_POST,"txtPassword");
    /* @var $user User */
    $user=$userDao->login($usnm,$pwd);
    if ($user!=null && $user->getUser() == $usnm){
        $_SESSION['user_logged'] = true;
        $_SESSION['name'] = $user->getUser();
        header("location:index.php");

    }else{
        $errMsg="Invalid username or passwword";
        echo $errMsg;
    }
}
?>
<form method="post">
    <fieldset>
        <legend>Login Form</legend>

        <label for="txtUsernameIdx" class="form-label">Username</label>
        <input id="txtUsernameIdx" name="txtUsername" type="text" autofocus required placeholder="Your username" class="form-input">

        <label for="txtPasswordIdx" class="form-label">Password</label>
        <input id="txtPasswordIdx" name="txtPassword" type="text" autofocus required placeholder="Your password" class="form=-input">

        <input type="submit" name="btnLogin" value="Login" class="button button-primary">
    </fieldset>
</form>
