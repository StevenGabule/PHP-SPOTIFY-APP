<?php 
/**
* Accounts managing code
*/
class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
        $this->errorArray = array();
    }

    public function register($username, $firstname, $lastname, $email, $password, $password2)
    {
        $this->validateUsername($username);
        $this->validateFirstname($firstname);
        $this->validateLastname($lastname);
        $this->validateEmail($email);
        $this->validatePasswords($password, $password2);
        if (empty($this->errorArray) == true) {
            return $this->insertUserDetails($username, $firstname, $lastname, $email, $password);
        } else {
            return false;
        }
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function validateUsername($un) 
    {
        if (strlen($un) > 25 || strlen($un) < 5) {
            return array_push($this->errorArray, Constants::$usernameCharacters);
        }
        //  TODO: CHECK IF USERNAME EXISTS
        $checking  = mysqli_query($this->con, "SELECT username FROM tblaccounts WHERE username='$un'");
        if (mysqli_num_rows($checking) != 0) {
            return array_push($this->errorArray, Constants::$usernameTaken);
        }
    }
    private function validateFirstname($fn) 
    {
        if (strlen($fn) > 25 || strlen($fn) < 5) {
            return array_push($this->errorArray, Constants::$firstNameCharacters);
        }
        # code...
    }
    private function validateLastname($ln) 
    {
        if (strlen($ln) > 25 || strlen($ln) < 5) {
            return array_push($this->errorArray, Constants::$lastNameCharacters);
        }
        # code...
    }

    private function validateEmail($email) 
    {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return array_push($this->errorArray, Constants::$emailInvalid);
         }
         //TODO: check the email is already exist
         //  TODO: CHECK IF USERNAME EXISTS
            $checking  = mysqli_query($this->con, "SELECT email FROM tblaccounts WHERE email='$email'");
            if (mysqli_num_rows($checking) != 0) {
                return array_push($this->errorArray, Constants::$emailTaken);
            }
    }

    private function validatePasswords($pw1, $pw2) 
    {
        if ($pw1 != $pw2) {
            return array_push($this->errorArray, Constants::$passwordDoNotMatch);
        }
        if (preg_match('/[^A-Za-z0-9]/', $pw1)) {
            return array_push($this->errorArray, Constants::$passwordNotAlphaNumeric);
        }
        if (strlen($pw1) > 30 || strlen($pw1) < 5) {
            return array_push($this->errorArray, Constants::$passwordCharacters);
        }
    }

    // inserting a detail
    private function insertUserDetails($un, $fn, $ln, $em, $pw)
    {
        $encrytedPw = md5($pw);
        $profile_pic = "assets/images/profile-pics/if_photo_370076.svg";
        $date = date("Y-m-d");
        return mysqli_query($this->con, "INSERT INTO tblaccounts VALUES('','$un', '$fn', '$ln', '$em', '$encrytedPw', '$date', '$profile_pic')");
    }

    public function login($un, $pw)
    {
        $pw = md5($pw);
        $query = mysqli_query($this->con, "SELECT * FROM tblaccounts WHERE username='$un' AND password='$pw'");
        if (mysqli_num_rows($query) == 1) {
            return true;
        } else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }
}


?>