
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
        <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="./assets/css/black-dashboard.css" rel="stylesheet" />

    </head>
    <main>
        <section>
            <img src=" ./assets/img/loginLogo.png" alt="loginLogo">
            <div class="card-img-overlay">
            </div>
            <div class="container">
                <div class="login-page">
                    <div class="card-login">


                        <h1>Cliente</h1>


                    </div>
                    <?php
                    if (isset($errors) && count($errors) > 0) {
                        foreach ($errors as $error_msg) {
                            echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                        }
                    }
                    ?>

                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <label for="inputEmailAddress" class="text-white form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="nombre@usuario.com">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <label for="inputPassword" class="text-white form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="row justify-content-center">

                                <button  type="success" native-type="submit" class="btn btn-blue" size="col-md-3">
                                    Iniciar Sesión
                                </button>

                        </div>
                        <div class="btn pull-right">

                            <a href="./paginas/admin.php" target="_blank">Acceso Administrador</a>

                        </div>

                    </form>
                </div>
            </div>
        </section>
    </main>


</body>

</html>