<?php

//inicio da sessão
session_start();

//define uma constante de controle
define('CONTROL',true);

//verifica se existe um usuário logado
$usuario_logado = $_SESSION['usuario'] ?? null;

//verifica qual é a rota da URL
if(empty($usuario_logado)){
    $rota = 'login';
}else {
    $rota = $_GET['rota'] ?? 'home';
}

//Se o usuário está logado, mas a rota é login, vai redirecionar para o home
if(!empty($usuario_logado) && $rota = 'login'){
    $rota = 'home';
}

//analise de rotas
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'logout' => 'logout.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php'
 ];

//


//verifica se existe uma rota, se não exibe a mensagem
if(!array_key_exists($rota,$rotas)){
    die('Acesso negado!');
}

require_once $rotas[$rota];
