<?php
session_start();
include_once("session.php");
// include("file.php");
interface validation_interface
{
    public function validate_name();
    public function validate_email();
    public function validate_dob();
    public function validate_password();
    // public function validate_file();
}
// trait for validation checking
trait validation_trait
{
    function my_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

/**
 * Check whether a value is empty or not
 * 
 * @param mixed $data The value to check is whether it is empty or not.
 * @return bool return yes if $data is not empty, false otherwise
 */
    function val_emptycheck($data)
    {
        return !empty($data);
    }

/**
 * Check whether pattren of a value is correct or not
 * 
 * @param mixed $data The value to check is whether it belongs given pattren.
 * @return bool return yes if $data dosen't belongs to the pattren, false otherwise
 */
    function val_alphabets($data)
    {
        return !preg_match("/^[a-zA-z' ]*$/", $data);
    }

/**
 * Check whether the email entered by user is in correct format or not
 * 
 * @param mixed $data The oprend to check the format
 * @return bool return yes if $data format is wrong, false otherwise
 */
    function val_email($data)
    {
        return !filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}


class validation extends database implements validation_interface
{
    public $name, $email, $password, $dob, $dobb, $file, $upload_date, $err, $pass, $passerr, $new_password, $sql1;
    public $nameerr, $emailerr, $passworderr, $doberr, $fileerr, $upload_date_err, $upload, $mofied_date;
    public $uploaded, $file_name, $unique_id, $del_pass;
    use validation_trait;

    public $name_edit_error, $email_edit_error, $dob_edit_error, $password_edit_error, $new_password_edit_error, $file_edit_error;
   
/**
 * Validating whether name is empty or not if not empty then validate whether pattren of the name feild is correct or not
 * 
 * @return                                 .
 */  
    public function validate_name()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->name = $_POST['name'];
            $_SESSION['db_name'] = $this->name;
            if ($this->val_emptycheck($this->name)) {
                if ($this->val_alphabets($this->name)) {
                    $this->nameerr = "Only alphabets and whitespace are allowed.";
                }
            } else {
                $this->nameerr = "Please enter you name";
            }
        }
    }
    public function validate_email()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->email = $_POST['email'];
            $_SESSION['db_email'] = $this->email;
            if ($this->val_emptycheck($this->email)) {
                if ($this->val_email($this->email)) {
                    $this->emailerr = "Invalid Format";
                }
            } else {
                $this->emailerr = "Please Enter Your Email Address";
            }
        }
    }
    public function validate_dob()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->dobb = $_POST['dob'];
            $_SESSION['db_dob'] = $this->dobb;
            $this->dob = new DateTime($_POST['dob']);
            $this->dob = $this->dob->format('Y-m-d');
            if (!$this->val_emptycheck($this->dobb)) {
                $this->doberr = "Please Enter DOB";
            }

        }
    }
    public function validate_password()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->password = $_POST['password'];
            if ($this->val_emptycheck($this->password)) {
                if (strlen($this->password) <= 8) {
                    $this->passworderr = "Your Password Must Contain At Least 8 Characters!";
                } elseif (!preg_match("#[0-9]+#", $this->password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Number!";
                } elseif (!preg_match("#[A-Z]+#", $this->password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Capital Letter!";
                } elseif (!preg_match("#[a-z]+#", $this->password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            } else {
                $this->passworderr = "Please enter a password";
            }
        }
    }

    public function validate_new_password()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->new_password = $_POST['new-password'];
            if (isset($this->new_password)) {
                if (strlen($this->new_password) <= 8) {
                    $this->passworderr = "Your Password Must Contain At Least 8 Characters!";
                } elseif (!preg_match("#[0-9]+#", $this->new_password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Number!";
                } elseif (!preg_match("#[A-Z]+#", $this->new_password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Capital Letter!";
                } elseif (!preg_match("#[a-z]+#", $this->new_password)) {
                    $this->passworderr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            }

        }
    }
    public function validate_pass()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->pass = $_POST['old'];
            $_SESSION['db_password'] = $this->pass;
            if (empty($this->pass)) {
                $this->passerr = "Please enterrrrrrrrrrrrr a password";
            }
        }
    }
    public function validate_file()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->file = $_FILES['photo'];
            $this->upload_date = date("Y-m-d");
            if ($_FILES["photo"]["name"] != "") {
                $this->file_name = $_FILES["photo"]["name"];
                $ex = array("jpg", "jpeg", "png");
                $ext = pathinfo($this->file["name"], PATHINFO_EXTENSION);
                echo $ext;

                if (in_array($ext, $ex)) {
                    $this->uploaded = "IMAGES/" . $this->file_name;
                    $this->unique_id = uniqid();

                } else {
                    $this->fileerr = "Invalid file type. Allowed file types: " . implode(", ", $ex);
                }
            }
        }
    }

}

class user extends validation
{

    public function updation()
    {
        $this->validate_name();
        $this->validate_email();
        $this->validate_dob();
        $this->validate_pass();
        if (isset($this->file)) {
            $this->validate_file();
        }

        if (isset($this->new_password)) {
            $this->validate_new_password();
        }


    }
    public function deletion()
    {
        $this->validate_pass();
    }
}

$val_object = new validation("localhost", "param", "161607", "user");
$val_object->nameerr;
echo "<br>";
$val_object->validate_name();
$val_object->validate_email();
$val_object->validate_dob();
$val_object->validate_password();
$val_object->validate_file();
$user_object = new user("localhost", "param", "161607", "user");
$user_object->updation();
$user_object->deletion();
// $user_object->delete();
if (!empty($_FILES["photo"])) {
    $val_object->validate_file();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new database("localhost", "param", "161607", "user");
    if (isset($_POST['submit'])) {
        if (!strlen($val_object->nameerr) && !strlen($val_object->emailerr) && !strlen($val_object->doberr) && !strlen($val_object->passworderr) && !strlen($val_object->fileerr)) {


            $dataToInsert = array(
                "email" => "$val_object->email",
                "name" => "$val_object->name",
                "dob" => "$val_object->dob",
                "password" => "$val_object->password"
            );
            $dataToFile = array(
                "email" => "$val_object->email",
                "image_name" => "$val_object->file_name",
                "unique_name" => "$val_object->unique_id",
                "uploaded_date" => "$val_object->upload_date",
            );
            if (move_uploaded_file($val_object->file["tmp_name"], $val_object->uploaded)) {
                $db->insertion("registration", $dataToInsert);
                $db->insertion_file("file_task", $dataToFile);
                header("location:loginform.php");

            } else {
                $val_object->err = "file location error";
            }


        }
    }
    if (isset($_POST['update'])) {
        if (!strlen($user_object->nameerr) && !strlen($user_object->emailerr) && !strlen($user_object->doberr) && !strlen($user_object->passworderr) && !strlen($user_object->passerr)) {
            echo "-----------------" . $_SESSION["db_password"];
            if ($user_object->pass == $_SESSION["db_password"]) {
                if (move_uploaded_file($val_object->file["tmp_name"], $val_object->uploaded)) {
                    $db->update_reg();
                    $db->update_file($val_object->file_name, date("Y-m-d"));
                } else {
                    $val_object->err = "file location error";
                }


                header("location:loginform.php");

            } else {
                $user_object->password_edit_error = "Please enter correct password";
            }
        }
    }

    if (isset($_POST['delete'])) {
        if (!strlen($user_object->passerr)) {
            if ($user_object->pass == $_SESSION["db_password"]) {
                $db->deletion_file($_SESSION['email_login']);
                $db->deletion_reg($_SESSION['email_login']);
                header("location:registrationform.php");
            }
        }
    }
    $db->closeConnection();
}

?>