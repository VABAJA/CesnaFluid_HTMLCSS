<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';



$userSession=new UserSession();
$user=new User();

if(isset($_SESSION['user'])){
    $user->setUser($userSession->getCurrentUser());
    include_once 'paginas/dashboard.php';
    echo "hay sesion";

}else if(isset($_POST['email']) && isset($_POST['password'])){
    
    $userForm = $_POST['email'];
    $passForm = $_POST['password'];

    $user = new User();
    
    if($user->userExists($userForm, $passForm)){
    
        echo"usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'paginas/dashboard.php';

    }else{
        //echo"nombre de usuario y/o password incorrecot";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'paginas/admin.php';
    }



}else{
    echo "login";
    include_once 'paginas/admin.php';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>Cesna Fluid</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="./assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />



</head>
<body>
    
</body>
</html>