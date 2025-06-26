<?php
$base = "http://localhost/portfolionovo/"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <base href="<?=$base?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/Group.svg" type="image/x-icon">
</head>
<body>
    <header>
        <div class="flex-linha">
            <div>
                <img src="img/Group.svg" alt="dev" class="logo" width="40" height="50">
            </div>
            <div>
                <h2>Matheus Ercoli</h2>
            </div>
            <div>
                <a href="javascript:MostrarMenu()" title="menu" class="header-menu"><i class="fa-solid fa-bars"></i></a>
            </div>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="sobre.html">Sobre</a></li>
                <li><a href="portfolio.html">Portfólio</a></li>
                <li><a href="serviços.html">Serviços</a></li>
                <li><a href="contato.html">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
    if (isset($_GET["param"])) {
      $p = explode("/", $_GET["param"]);
    }
    $page = $p[0] ?? "home";

    $pagina = "paginas/{$page}.php";

    //verificar se o arquivo existe
    if (file_exists($pagina)) {
      include($pagina);
    } else {
      include("paginas/error.php");
    }
    ?>
    </main>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script>
        function MostrarMenu() {
            $('.header-nav').toggle();
        }
    </script>
</body>
</html>