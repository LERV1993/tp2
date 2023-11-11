<?php
session_start();
error_reporting(0);
$varsession = $_SESSION['email'];
$roles = $_SESSION['roles'];
if ($varsession == null || $varsession == '') {
    header("Location:http://localhost/tp2/");
}

if (!in_array("contacto", $roles)) {
    header("Location:http://localhost/tp2/inicio/");
}


if (isset($_POST['submit'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['telefono'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logistic freedom</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../styles/contacto.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar bg-body-tertiary fixed-top" style="padding: 0;">

        <div class="container-fluid">

            <div>
                <a class="navbar-brand" href="#">
                    <img class="imageNav" src="../images/favicon.png" alt="logo">
                </a>

                <a class="btn btn-warning m-1" href="../includes/api/auth-api/logout.php"> Cerrar session </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                        <?php

                        if (in_array("alta productos", $roles)) {
                            echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/tp2/alta-productos">Alta de productos</a>
                            </li>';
                        }

                        if (in_array("gestion usuarios", $roles)) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="/tp2/gestion-usuarios/">Gestión de usuarios</a>
                            </li>';
                        }

                        if (in_array("reportes", $roles)) {
                            echo '  <li class="nav-item">
                                <a class="nav-link" href="/tp2/reportes/">Reportes</a>
                                </li>';
                        }

                        if (in_array("stock", $roles)) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="/tp2/stock/">Stock</a>
                            </li>';
                        }

                        if (in_array("contacto", $roles)) {
                            echo '<li class="nav-item">
                            <a class="nav-link active" href="/tp2/contacto/">Contacto</a>
                            </li>';
                        }

                        if (in_array("revisar contacto", $roles)) {
                            echo '<li class="nav-item">
                            <a class="nav-link" href="/tp2/revisar-contacto/">Revisar contacto</a>
                            </li>';
                        }


                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/tp2/historia/">Historia</a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </nav>


    <section class="cardContact">
        <h1 class="title">Contáctenos</h1>

        <div class="contact-wrapper">
            <div class="contact-form">
                <form id="formContacto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                    <div class="mb-3">

                        <label for="fullname" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="fullname" placeholder="Ingrese su nombre" required value="<?php if (isset($nombre))
                                                                                                                                                echo $nombre ?>">
                    </div>


                    <div class="mb-3">

                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" required value="<?php if (isset($email))
                                                                                                                                            echo $email ?>">
                    </div>

                    <div class="mb-3">

                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="number" name="telefono" class="form-control" pattern="[0-9] {10}" title="Solo se podran colocar 10 digitos" id="telefono" placeholder="Ingrese su email" required value="<?php if (isset($tel))
                                                                                                                                                                                                                    echo $tel ?>">
                    </div>


                    <div class="mb-3">

                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control" placeholder="Ingrese su mensaje" name="mensaje" id="mensaje" required></textarea>

                    </div>


                    <p class="botones">
                        <button class="btn btn-success" type="submit" name="submit">Enviar</button>
                    </p>
                    <?php
                    include("validar1.php");

                    ?>
                </form>
            </div>

        </div>
    </section>

    <script src="https://kit.fontawesome.com/ce1f10009b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>