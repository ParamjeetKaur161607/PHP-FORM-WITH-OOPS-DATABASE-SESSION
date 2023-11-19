<?php
// session_start();
class database
{
    public $insert,$conn;
    private $servername;
    private $username;
    public $password;
    private $dbname;
    public $email_login,$password_login,$pass,$col,$val,$columns,$values,$row,$sql1;
    public $email_log,$update,$sql, $result,$row1, $file_sql, $file_result, $file_row,$name_update,$email_update,$new_password,$dob_update,$password_update;

    public $name_edit, $email_edit, $dob_edit, $password_edit, $file_edit,$delete_file,$delete_reg;


    public function __construct($host, $username, $password, $database)
    {       
        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }        
    }    
    public function insertion($tableName, $data)
    {        
        $this->columns = implode(", ", array_keys($data));
        $this->values = "'" . implode("', '", array_values($data)) . "'";        
        $sql = "INSERT INTO registration($this->columns) VALUES($this->values)";        
        if ($this->conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }               
    }

    public function insertion_file($tableName, $data){
        $this->columns = implode(", ", array_keys($data));
        
        $this->values = "'" . implode("', '", array_values($data)) . "'";    
          
        $sql = "INSERT INTO file_task($this->columns) VALUES($this->values)";         
        echo $sql;        
        if ($this->conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }     
    }
    public function update_reg(){ 
        $this->email_log= $_SESSION["login"];  
        $this->sql = "SELECT * FROM registration WHERE email='$this->email_log'";
        $this->result=mysqli_query($this->conn, $this->sql);
        $this->myrow = mysqli_fetch_assoc($this->result);
        // email='$this->email', name='$this->name', dob='$this->dob', password='this->password'
         
        $this->update = "UPDATE registration SET email='$_SESSION[db_email]', name='$_SESSION[db_name]', dob='$_SESSION[db_dob]', password='$_SESSION[db_password]' where email='$this->email_log'";   
        echo $this->update;
        if ($this->conn->query($this->update) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $$this->update . "<br>" . $this->conn->error;
        }     
        // if (!empty($new_password)) {
        //     $this->password_update = "UPDATE registration SET password='$this->new_password' where email='$this->email_log'";
        //     $this->password_updated = mysqli_query($this->conn, $this->password_update);
        // }
    }
    public function update_file($image_name,$modified_date){
        $this->email_log= $_SESSION["login"];
        $this->file_sql = "SELECT * FROM file_task WHERE email='$this->email_log'";
        $this->file_result=mysqli_query($this->conn, $this->file_sql);
        $this->file_row = mysqli_fetch_assoc($this->file_result);
        $this->update = "UPDATE file_task SET image_name='$image_name', modified_date='$modified_date' where email='$this->email_log'";   
        echo $this->update;
        if ($this->conn->query($this->update) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $$this->update . "<br>" . $this->conn->error;
        }
        
    }

    public function deletion_file($email){
        $this->sql1 = "DELETE from file_task WHERE email='$email'";    
        echo $this->sql1;              
        if ($this->conn->query($this->sql1) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $$this->update . "<br>" . $this->conn->error;
        }  
                     
        }
    public function deletion_reg($email){       

        $this->sql = "DELETE from registration WHERE email='$email'";
        if ($this->conn->query($this->sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $$this->update . "<br>" . $this->conn->error;
        }
    }
    public function closeConnection() {
        $this->conn->close();
    } 
    
   
}

?>