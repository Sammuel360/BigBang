<?PHP

namespace Source\Controllers;

use Source\Models\UsuarioModel;

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function autenticar(string $email, string $password)
    {
        // Sanitizando o email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $usuario = $this->usuarioModel->findByEmail($email);

        /* var_dump([
            $usuario->senha,
            $password,
            password_verify($password, $usuario->senha)

        ]);
        exit();*/
        if ($usuario && password_verify($password, $usuario->senha)) {
            // Inicia a sessão e armazena o usuário logado
            $_SESSION['usuario'] = $usuario;
            header("Location: tema/admin/dashboard.php");

            exit;
        }

        // Mensagem de erro
        header("Location: index.php?message=Email ou senha incorretos");
    }

    public function inserir(string $nome, string $email, string $telefone, string $endereco, string $cidade, string $estado, string $cep, string $senha)
    {
        try {
            // Sanitizando os dados de entrada
            $nome = filter_var($nome, FILTER_SANITIZE_STRING);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $telefone = filter_var($telefone, FILTER_SANITIZE_STRING);
            $endereco = filter_var($endereco, FILTER_SANITIZE_STRING);
            $cidade = filter_var($cidade, FILTER_SANITIZE_STRING);
            $estado = filter_var($estado, FILTER_SANITIZE_STRING);
            $cep = filter_var($cep, FILTER_SANITIZE_STRING);

            // Validação de dados
            if (empty($nome) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($senha)) {
                header("Location: index.php?error=Dados inválidos.");
                exit;
            }

            // Verificação de e-mail duplicado
            if ($this->usuarioModel->findByEmail($email)) {
                header("Location: index.php?error=E-mail já cadastrado.");
                exit;
            }

            // Criptografando a senha
            $senha = password_hash($senha, PASSWORD_DEFAULT);

            // Salvando o usuário
            if (!$this->usuarioModel->save([
                'nome' => $nome,
                'email' => $email,
                'telefone' => $telefone,
                'endereco' => $endereco,
                'cidade' => $cidade,
                'estado' => $estado,
                'cep' => $cep,
                'senha' => $senha
            ])) {
                header("Location: index.php?message={$this->usuarioModel->getMessage()}");
                exit;
            }
            header("Location: index.php?message=Usuário cadastrado com sucesso");
            exit;
        } catch (\Exception $e) {
            header("Location: index.php?error=Erro ao salvar usuário. Tente novamente.");
            exit;
        }
    }

    public function logar()
    {
        // Página de login
        require 'tema/admin/logar.php';
    }

    public function main()
    {
        // Página principal após o login
        require 'tema/admin/main.php';
    }

    public function cadastrar()
    {
        // Página de cadastro
        require 'tema/admin/cadastroUsuario.php';
    }
}