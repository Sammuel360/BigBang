<?php

namespace Source\Controllers;

use Source\Models\CategoriaModel;

class CategoriaController
{
    private $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    public function listar()
    {
        return $this->categoriaModel->listAll(); // Renomeado para listar
    }

    public function inserir(string $nome, string $descricao)
    {
        try {
            $this->categoriaModel->save([
                'nome' => $nome,
                'descricao' => $descricao
            ]);

            if ($this->categoriaModel->getMessage()) {
                header("Location: index.php?message={$this->categoriaModel->getMessage()}");
                exit;
            }

            header("Location: index.php?message=Categoria cadastrada com sucesso");
            exit;
        } catch (\Exception $e) {
            header("Location: index.php?error=Erro ao salvar categoria. Tente novamente.");
            exit;
        }
    }

    public function deletar(int $id)
    {
        try {
            if ($this->categoriaModel->deleteById($id)) {
                header("Location: index.php?message=Categoria deletada com sucesso");
            } else {
                header("Location: index.php?error=Erro ao deletar categoria");
            }
            exit;
        } catch (\Exception $e) {
            header("Location: index.php?error=Erro ao deletar categoria. Tente novamente.");
            exit;
        }
    }
}
