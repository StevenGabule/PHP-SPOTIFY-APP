<?php 
  
  function sanitizeFormUsername($inputText) {
    return strip_tags(str_replace(" ", "", $inputText));
  }

  function sanitizeFormPassword($inputText) {
    return strip_tags($inputText);
  }

  function sanitizeFormString($inputText) {
    return ucfirst(strtolower(strip_tags(str_replace(" ", "", $inputText))));
  }

  

  if (isset($_POST['registerSubmit'])) {
    $username = sanitizeFormUsername($_POST['username']);
    $firstname = sanitizeFormString($_POST['firstname']);
    $lastname = sanitizeFormString($_POST['lastname']);
    $email = sanitizeFormString($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
    $result = $account->register($username, $firstname, $lastname, $email, $password, $password2);
    if ($result) {
      $_SESSION['userloggedIn'] = $username;
      header("Location: index_admin.php");
    } 
    
  }
?>