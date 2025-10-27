<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?=$title ?? "" ?></title>
</head>
<body>
    <main class="container">
    <?php include "components/components_navbar.php";?>
    Bienvenue <strong><?=$_SESSION["firstname"] ?? ""?></strong> sur cette page accessible si connecté !
    </main>
</body>
<?php include "components/components_footer.php";?>
</html>