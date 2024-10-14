<?php

namespace Source\Controllers;

use Source\Models\ChamadoModel;
use Source\Models\AnexoModel; // Supondo que você tenha um AnexoModel para gerenciar anexos

class ChamadoController
{
    private $chamadoModel;
    private $anexoModel;

    public function __construct()
    {
        $this->chamadoModel = new ChamadoModel();
        $this->anexoModel = new AnexoModel(); // Novo para lidar com anexos
    }

    public function all()
    {
        return $this->chamadoModel->all();
    }

    public function inserir($usuario_id, $descricao, $localizacao, $status, $anexo = null)
    {
        $this->chamadoModel->usuario_id = $usuario_id;
        $this->chamadoModel->descricao = $descricao;
        $this->chamadoModel->localizacao = $localizacao;
        $this->chamadoModel->status = $status;

        // Salva o chamado
        $this->chamadoModel->save();

        if ($this->chamadoModel->getMessage()) {
            header("Location: index.php?m={$this->chamadoModel->getMessage()}");
            exit;
        }

        // Verifica se existe um anexo e processa o upload
        if (!empty($anexo) && $anexo['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'; // Diretório onde você deseja salvar os arquivos
            $uploadFile = $uploadDir . basename($anexo['name']);

            if (move_uploaded_file($anexo['tmp_name'], $uploadFile)) {
                // Salva o caminho do anexo no banco de dados
                $this->anexoModel->chamado_id = $this->chamadoModel->data->id;
                $this->anexoModel->caminho_arquivo = $uploadFile;
                $this->anexoModel->save();
            }
        }
    }

    public function deletar($id)
    {
        $this->chamadoModel->id = $id;
        $this->chamadoModel->destroy();
    }
}
