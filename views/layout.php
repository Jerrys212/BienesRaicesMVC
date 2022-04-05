<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raices</title>
    <link rel="stylesheet" type="text/css" href="../build/css/app.css" />
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
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <?php if ($auth) : ?>

                        <a href="/logout">Cerrar Sesion</a>

                    <?php endif; ?>
                </nav>
            </div>
            <?php echo $inicio ? "<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos Exclusivos de lujo</h1>" : '';
            ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>


        <p class="copy">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>

</html>