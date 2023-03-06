<?php

  require_once("globals.php");
  require_once("db.php");
  require_once("models/User.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message($BASE_URL);

  $userDao = new UserDAO($conn, $BASE_URL);

  $type = filter_input(INPUT_POST, "type");

  if($type === "update") {

    $userData = $userDao->verifyToken();
    
    $name = filter_input(INPUT_POST, "name");    
    $email = filter_input(INPUT_POST, "email");
    
   
    $user = new User();
   
    $userData->name = $name;
    
    $userData->email = $email;  
       

    $userDao->update($userData);


  } else if($type === "changepassword") {

    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
 
    $userData = $userDao->verifyToken();
    
    $id = $userData->id;

    if($password == $confirmpassword) {
     
      $user = new User();

      $finalPassword = $user->generatePassword($password);

      $user->password = $finalPassword;
      $user->id = $id;

      $userDao->changePassword($user);

    } else {
      $message->setMessage("As senhas não são iguais!", "error", "back");
    }

  } else {

    $message->setMessage("Informações inválidas!", "error", "index.php");

  }