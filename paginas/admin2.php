<?php

include('./scripts/config.php');
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM loginadmin WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['ID'];
            echo '<p class="success">Congratulations, you are logged in!</p>';
            $_SESSION = $getRow;
            header('location:./dashboard.php');
            exit();
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}


?>


<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit;
} else {
    // Show users the page!
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>Cesna Fluid</title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/demo/demo.css" rel="stylesheet" />
    </head>
    <main>
        <section>
            <img src=" ../assets/img/loginLogo.png" alt="loginLogo">
            <div class="card-img-overlay">
            </div>
            <div class="container">
                <div class="login-page">
                    <div class="card-login">

                        <h1>Administrador</h1>

                    </div>
                    <form name="loginform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class=" row justify-content-center">
                            <div class="col-md-3">
                                <label for="form-control" class="text-white form-label">Usuario</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@usuario.com" name="adminname" value="">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <label for="form-control" class="text-white form-label">Contraseña</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña" name="password" valu="">
                            </div>
                        </div>
                        <div class="row justify-content-center">

                            <button native-type="submit" type="success" class="btn btn-blue" size="col-md-3" name="login" value="Sign In">
                                Iniciar Sesión
                            </button>
                        </div>

                    </form>

                    <div class="pull-right">
                        <div class="link footer-link">
                            <h6><a href="http://www.vabaja.com.mx">
                                    ¿Necesitas ayuda? Contacta a VABAJA
                                </a>
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>