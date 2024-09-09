<?php

defined('CONTROL') or die('Acesso negado');

session_destroy();

//Volta para a pagina login
header('location: index.php?rota=login');