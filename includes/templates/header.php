<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="stylesheet" type="text/css" href="/build/css/app.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Logo" />
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono Menú Responsive" />
                </div>
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if ($auth) : ?>

                        <a href="/cerrar-sesion.php">Cerrar Sesion</a>

                    <?php endif; ?>
                </nav>
            </div>
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de lujo </h1>" : '';
            ?>
        </div>
    </header>