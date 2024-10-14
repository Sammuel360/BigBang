<?php

namespace Source\Controllers;

use Source\Models\StatusModel;

class StatusController
{
    private $statusModel;

    public function __construct()
    {
        $this->statusModel = new StatusModel();
    }

    public function index()
    {
        // Processa as ações de inserção ou atualização
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['acao'])) {
                switch ($_POST['acao']) {
                    case 'cadastrar':
                        $this->inserir($_POST['chamado_id'], $_POST['status_anterior'], $_POST['status_atual']);
                        break;
                    case 'atualizar':
                        $this->atualizar($_POST['id'], $_POST['status_anterior'], $_POST['status_atual']);
                        break;
                }
            }
        }

        // Busca todos os status
        $statusList = $this->statusModel->list();
        require 'tema/admin/status.php'; // Exibe a página com formulário e lista
    }

    // Método para inserir um novo status
    private function inserir(int $chamado_id, string $status_anterior, string $status_atual)
    {
        try {
            // Validação de dados
            if (empty($chamado_id) || empty($status_anterior) || empty($status_atual)) {
                header("Location: index.php?error=Dados inválidos.");
                exit;
            }

            // Salvando o status
            if (!$this->statusModel->save([
                'chamado_id' => $chamado_id,
                'status_anterior' => $status_anterior,
                'status_atual' => $status_atual,
            ])) {
                header("Location: index.php?message={$this->statusModel->getMessage()}");
                exit;
            }

            header("Location: index.php?message=Status cadastrado com sucesso");
            exit;
        } catch (\Exception $e) {
            header("Location: index.php?error=Erro ao salvar status. Tente novamente.");
            exit;
        }
    }

    // Método para atualizar um status
    private function atualizar(int $id, string $status_anterior, string $status_atual)
    {
        try {
            // Validação de dados
            if (empty($status_anterior) || empty($status_atual)) {
                header("Location: index.php?error=Dados inválidos.");
                exit;
            }

            // Atualizando o status
            if (!$this->statusModel->updateStatus($id, [
                'status_anterior' => $status_anterior,
                'status_atual' => $status_atual,
            ])) {
                header("Location: index.php?message={$this->statusModel->getMessage()}");
                exit;
            }

            header("Location: index.php?message=Status atualizado com sucesso");
            exit;
        } catch (\Exception $e) {
            header("Location: index.php?error=Erro ao atualizar status. Tente novamente.");
            exit;
        }
    }
}
