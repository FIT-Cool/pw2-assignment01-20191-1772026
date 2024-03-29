<?php


class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function index()
    {
        $loginPressed=filter_input(INPUT_POST,'btnLogin');
        if (isset($loginPressed)){
            $usnm=filter_input(INPUT_POST,"txtUsername");
            $pwd=filter_input(INPUT_POST,"txtPassword");
            /* @var $user User */
            $user=$this->userDao->login($usnm,$pwd);
            if ($user!=null && $user->getUser() == $usnm){
                $_SESSION['user_logged'] = true;
                $_SESSION['name'] = $user->getUser();
                header("location:index.php");
            }else{
                $errMsg="Invalid username or passwword";
                echo $errMsg;
            }
        }
        include_once 'View/login.php';
    }
}