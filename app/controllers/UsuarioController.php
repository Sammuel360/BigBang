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
        return "tema/admin/logar.php";
    }
    public function main()
    {
        if (isset($_SESSION['usuario'])) {
            return "tema/admin/tela1.php";
        }

        return $this->logar();
    }

    public function cadastrar()
    {
        return "tema/admin/cadastroUsuario.php";
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


    public function inserir(string $nome, string $telefone, string $email, string $nivel_acesso, string $senha)
    {
        $this->usuarioModel->nome           = $nome;        
        $this->usuarioModel->email          = $email;
        $this->usuarioModel->senha          = md5($senha);
        $this->usuarioModel->telefone       = $telefone;
        $this->usuarioModel->endereco          = $endereco;
        $this->usuarioModel->cidade          = $cidade;
        $this->usuarioModel->estado          = $estado;
        $this->usuarioModel->cep          = $cep;
       
        
        
        $this->usuarioModel->save();

        //exit(var_dump($this->usuarioModel));

        if ($this->usuarioModel->getMessage()) {
            header("location:index.php?m={$this->usuarioModel->getMessage()}");
        }

        
    }

}