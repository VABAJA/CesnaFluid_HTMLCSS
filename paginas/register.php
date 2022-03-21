<?php

include('../scripts/config.php');
session_start();

if (isset($_POST['register'])) {

    // $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM administrador WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">The email address is already registered!</p>';
    }

    if ($query->rowCount() == 0) {
        // USERNAME
        $query = $connection->prepare("INSERT INTO loginadmin(PASSWORD,EMAIL) VALUES (:password_hash,:email)");
        // :username,
        // $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo '<p class="success">Your registration was successful!</p>';
        } else {
            echo '<p class="error">Something went wrong!</p>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/black-dashboard.css" rel="stylesheet" />

    <title>Registro</title>
</head>

<body>

    <main>
        <section>
            <div class="card-img-overlay">
                <img src="../assets/img/logovabaja-transparente-08.png" alt="vabajalogo">
            </div>

            <form method="post" action="" name="signup-form">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <label for="form-control" class="text-white form-label">Correo</label>
                        <input type="email" class="form-control" placeholder="correo@dominio.com" name="email" value="" required>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <label for="form-control" class="text-white form-label">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" value="" required>
                    </div>
                </div>
                <button type="submit" name="register" value="register">Register</button> 
            </form>


            <!--  <div class="form-element">
                <label>Email</label>
                <input type="email" name="email" required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div>
            -->
        </section>
    </main>
</body>

</html>