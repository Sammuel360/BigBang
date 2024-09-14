<?php
namespace Source\Controlers;
use Source\Models\UsuarioModel;
class Usuario
{
    private $usuarioModel;

    public function __construct() 
    {
        $this->usuarioModel = new UsuarioModel();
    }
    public function logar() 
    {
        return "app/views//logar.php";
    }
    public function main()
    {
        if (isset($_SESSION['usuario'])) {
            return "app/views/tela1.php";
        }

        return $this->logar();
    }

    public function cadastrar()
    {
        return "cadastroUsuario.php";
    }

    public function autenticar(string $email,string $senha)
    {
        $usuario = $this->usuarioModel->findByEmail($email);
        if ($usuario) {
            if ($usuario->senha == md5($senha)){
                $_SESSION['usuario'] = $usuario;
                header("location:index.php?c=usuario&a=main");
            }else {
                header("location:index.php?message=Falha na autenticacao");
            }
        }else{
            header("location:index.php?message=Acesso negado! Contate o administrador.");
        }
        
    }

    public function all(): ?array
    {
        return $this->usuarioModel->all();
    }


    public function inserir(string $nome, string $email, string $telefone, string $endereco, string $cidade,string $estado,string $cep,string $senha)
    {
        $this->usuarioModel->nome           = $nome;        
        $this->usuarioModel->email          = $email;
        $this->usuarioModel->telefone       = $telefone;
        $this->usuarioModel->endereco          = $endereco;
        $this->usuarioModel->cidade          = $cidade;
        $this->usuarioModel->estado          = $estado;
        $this->usuarioModel->cep          = $cep;
        $this->usuarioModel->senha          = md5($senha);
       
        
        
        $this->usuarioModel->save();

        //exit(var_dump($this->usuarioModel));

        if ($this->usuarioModel->getMessage()) {
            header("location:index.php?m={$this->usuarioModel->getMessage()}");
        }

        
    }

}