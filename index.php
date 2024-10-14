<?php

use Source\Controllers\UsuarioController;
use Source\Controllers\ChamadoController; // Para gerenciar chamados
use Source\Controllers\StatusController; // Para gerenciar status

session_start();

require_once 'vendor/autoload.php';

$c = 'usuario';
$a = 'logar';

if (isset($_GET['c']) && isset($_GET['a'])) {
    $c = filter_var($_GET['c'], FILTER_SANITIZE_STRING); // controller
    $a = filter_var($_GET['a'], FILTER_SANITIZE_STRING); // action
}

switch ($c) {
    case 'usuario':
        $controller = new UsuarioController();
        switch ($a) {
            case 'logar':
                // Lógica de autenticação de usuário
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
                    $controller->autenticar($_POST['email'], $_POST['password']);
                } else {
                    $controller->logar();
                }
                break;
            case 'main':
                $controller->main();
                break;
            case 'cadastrar':
                $controller->cadastrar();
                break;
            case 'inserir':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->inserir(
                        $_POST['nome'],
                        $_POST['email'],
                        $_POST['telefone'],
                        $_POST['endereco'],
                        $_POST['cidade'],
                        $_POST['estado'],
                        $_POST['cep'],
                        $_POST['senha']
                    );
                } else {
                    $controller->cadastrar();
                }
                break;
            default:
                $controller->logar();
                break;
        }
        break;

    case 'chamado':
        $controller = new ChamadoController();
        switch ($a) {
            case 'all':
                $controller->all(); // Exibe todos os chamados
                break;
            case 'inserir':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->inserir(
                        $_POST['usuario_id'],
                        $_POST['descricao'],
                        $_POST['localizacao'],
                        $_POST['status'],
                        $_FILES['anexo'] // Passa o anexo para o controller
                    );
                }
                break;
            case 'deletar':
                if (isset($_GET['id'])) {
                    $controller->deletar($_GET['id']);
                }
                break;
            default:
                $controller->all();
                break;
        }
        break;



    default:
        $controller = new UsuarioController();
        $controller->logar();
        break;
}
