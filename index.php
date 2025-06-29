<?php
$base = "http://localhost/portfolionovo/home"
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio</title>
    <base href="<?=$base?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="img/Group.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="flex-linha">
            <div>
                <h2>Matheus Ercoli</h2>
            </div>
            <div>
                <a href="javascript:MostrarMenu()" title="menu" class="header-menu"><i class="fa-solid fa-bars"></i></a>
            </div>
            <nav class="header-nav header-desk">
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="sobre">Sobre</a></li>
                <li><a href="portfolio">Portfólio</a></li>
                <li><a href="servicos">Serviços</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
        </div>
    </header>
     <nav class="header-nav header-celular">
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="sobre">Sobre</a></li>
                <li><a href="portfolio">Portfólio</a></li>
                <li><a href="servicos">Serviços</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </nav>
    <main>
        <?php
    if (isset($_GET["param"])) {
      $p = explode("/", $_GET["param"]);
    }else{
        $p = [];
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script>
        function MostrarMenu() {
            $('.header-celular').toggle();
        }
        function abrirPagina(pagina){
            $('#content').load(`paginas/${pagina}.php`);
        }
        abrirPagina('Mce-Celulares');
    </script>
</body>
</html>