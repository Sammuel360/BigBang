<?php
<<<<<<< HEAD

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
=======
use Source\Controlers\Cargo;
use Source\Controlers\Etapas;
use Source\Models\ProcessoModel;

session_start();
use Source\Controlers\funcionario;

use Source\Controlers\Departamento;
use Source\Controlers\Usuario;
use Source\Controlers\Processo;

require_once 'vendor/autoload.php';



$c = 'web';


if (isset($_GET['c']) && isset($_GET['a'])) {
    $c = filter_var($_GET['c'], FILTER_SANITIZE_STRING); // controller
    $a = filter_var($_GET['a'], FILTER_SANITIZE_STRING); // action 
}

/**
 * Gerencia as rotas da aplicação
 */

switch ($c) {
    case 'usuario':
        switch ($a) {
            case 'logar':
                $controller = new Usuario();
                $controller->autenticar($_POST['email'], $_POST['password']);
                break;
            case 'main':
                $controller = new Usuario();
                include $controller->main();
                break;
            case 'cadastrar':
                $controller = new Usuario();
                include $controller->cadastrar();
                break;
            case 'inserir':
                $controller = new Usuario();
                $controller->inserir($_POST['nome'], $_POST['telefone'], $_POST['email'], $_POST['nivel_acesso'], $_POST['senha']);
                break;
        }
        break;
    case 'departamento':
        switch ($a) {
            case 'cadastrar':
                $controller = new Departamento();
                //Entrega a tela de cadastro de um novo departamento
                include $controller->cadastrar();

                break;
            case 'inserir':
                $controller = new Departamento();
                //Realiza a inserção de um novo departamento
                $controller->inserir(
                    $_POST['nome'],
                    $_POST['email'],
                    $_POST['telefone']
                );
                break;
            case 'verlista':
                $controller = new Departamento();
                include $controller->verLista();
                break;
            case 'destroy':
                $controller = new Departamento();
                $controller->destroy($_GET['iddepartamento']);
>>>>>>> a82cbba702854a9947880ccfdeecc9b616a0696f
                break;
        }
        break;

<<<<<<< HEAD


    default:
        $controller = new UsuarioController();
        $controller->logar();
        break;
}
=======
    case 'cargo':
        switch ($a) {
            case 'cadastrar':
                $controller = new Cargo();
                //Entrega a tela de cadastro de um novo cargo
                include $controller->cadastrar();
                break;
            case 'inserir':
                $controller = new Cargo();
                $controller->inserir($_POST['nome'], $_POST['funcao']);
                break;
            case 'verlista':
                $controller = new Cargo();
                include $controller->verLista();
                break;
            case 'destroy':
                $controller = new Cargo();
                $controller->destroy($_GET['idcargo']);
                break;
        }
        break;
    case 'funcionario':

        switch ($a) {
            case 'cadastrar':
                $controller = new Funcionario();
                $departamentoController = new Departamento();
                $cargoController = new Cargo();
                $usuarioController = new Usuario();

                //Entrega a tela de cadastro de um novo cargo
                include $controller->cadastrar();
                break;
            case 'inserir':
                $controller = new Funcionario();
                $controller->inserir(
                    $_POST['nome'],
                    $_POST['cpf'],
                    $_POST['iddepartamento'],
                    $_POST['numero_matricula'],
                    $_POST['idcargo'],
                    $_POST['idusuario'],
                );
                break;
            case 'verlista':
                $controller = new Funcionario();
                $funcionarios = $controller->all();
                include $controller->verLista();
                break;
            case 'destroy':
        }
        break;
    case 'processo':
        switch ($a) {
            case 'cadastrar':
                $controller = new Processo();
                $departamentoController = new Departamento();
                $funcionarioController = new Funcionario();
                include $controller->cadastro();


                break;

            case 'inserir':
                $controller = new Processo();
                $controller->inserir(
                    $_POST['tipoProcesso'],
                    $_POST['nome'],
                    $_POST['prioridade'],
                    $_POST['responsavel'],
                    $_POST['prazo'],
                    $_POST['data_abertura'],
                    $_POST['iddepartamento'],
                    $_POST['idfuncionario'],
                );

                break;
            case 'verlista':
                $controller = new Processo();
                $processos = $controller->all();
                include $controller->verLista();
                break;
        }
        break;

    case 'etapas':
        switch ($a) {
            case 'cadastrar':
                $controller = new Etapas();
                $processoController = new Processo();
                include $controller->cadastro();
                break;
            case 'inserir':
                $controller = new Etapas();
                $controller->inserir(
                    $_POST['descricao'],
                    $_POST['data_movimentacao'],
                    $_POST['idprocesso'],

                );
                break;

            default:
                $controller = new Usuario();
                include $controller->logar();
                break;


        }

}


>>>>>>> a82cbba702854a9947880ccfdeecc9b616a0696f
