<?php
defined('CONTROL') or die("Acesso negado!");

if (isset($_GET['rota'])) {
    if ($_GET['rota'] === 'logout') {
        session_destroy();
        header('Location: index.php?rota=logout');
        exit(); 
    } elseif ($_GET['rota'] === 'page1') {
        header('Location: index.php?rota=page1');
        exit(); 
    } elseif ($_GET['rota'] === 'page2') {
        header('Location: index.php?rota=page2');
        exit(); 
    }
}
?>

<hr>
<span>Usuario: <strong><?= $_SESSION['usuario']?></strong></span>
<span>
    <a href="?rota=logout">sair</a>
</span>
<hr>

<nav>
    <a href="?rota=page1">pagina1</a>
    <a href="?rota=page2">pagina2</a>
    <a href="?rota=logout">Sair</a>
</nav>