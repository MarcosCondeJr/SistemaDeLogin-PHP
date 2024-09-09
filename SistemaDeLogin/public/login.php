<?php
    defined('CONTROL') or die('Acesso negado!');

    //verifica se o formulário foi submetido através do botão
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //verifica se o usuário e senha foram submetidas
        $usuario = $_POST['usuario'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $erro = null;

        if(empty($usuario) || empty($senha)){
            $erro = "Usuário e senha são obrigatórios!";
        }
        
         // verifica se o usuário e password são válidos
        if(empty($erro)){
            
            $usuarios = require_once __DIR__ . '/../users/usuarios.php';

            foreach($usuarios as $user){
                if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
                    
                    // efetua o login
                    $_SESSION['usuario'] = $usuario;

                    // volta para a página inicial
                    header('location: index.php?rota=home');
                    exit;
                }               
            }
            $erro = "Usuário e/ou senha inválidos!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div class="usuario">
            <label for="usuario">Usuário</label>
            <input type="email" name="usuario" id="usuario">
        </div>
        <div class="password">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div class="button">
            <button type="submit">Entrar</button>
        </div>
    </form>

    <?php if(!empty($erro)): ?>
        <p style="color: red"><?= $erro ?></p>
    <?php endif; ?>    
</body>
</html>
