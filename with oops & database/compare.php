<?php
session_start();
include("session.php");
class compare_class extends database{
    public $email_login, $password_login,$pass;
    public function comp(){
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->email_login = $_POST['email-login'];
            $_SESSION['email_login']=$this->email_login;
            $this->password_login = $_POST['password-login'];
            $this->email_login = mysqli_real_escape_string($this->conn, $this->email_login);
            $this->password_login = mysqli_real_escape_string($this->conn, $this->password_login);            
            $sql = "SELECT * FROM registration WHERE email = '$this->email_login'";            
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);                      
                if ($this->password_login == $row['password']) {                               
                    $_SESSION['login'] = $_POST['email-login'];  
                    // echo $_SESSION['login'];                  
                    $_SESSION['password'] = $this->password_login;                   
                    $_SESSION['password'];
                    header("location:dashboard.php");            
                }
                else{
                    $this->pass = "Please enter correct password";
                }
            } else {
                $this->pass = "Please resiter yourself";
            }
        }
    }
}
$comapre_object=new compare_class("localhost", "param", "161607", "user");
$comapre_object->comp();
?>