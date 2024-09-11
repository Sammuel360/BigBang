<?php

namespace Source\Models;

use Source\Core\Model;

class AnexoModel extends Model
{
    /**
     * O método save salva ou atualiza no banco de dados os anexos cadastrados.
     */
    public function save(): ?AnexoModel
    {
        if (!$this->required()) {
            return null;
        }

        // Update
        if (!empty($this->data->idanexo)) {
            $query = "UPDATE anexo SET 
                    id_chamado = :id_chamado, 
                    arquivo = :arquivo, 
                    descricao = :descricao
                WHERE idanexo = :idanexo";
            $params = ":id_chamado={$this->data->id_chamado}&:arquivo={$this->data->arquivo}" .
                "&:descricao={$this->data->descricao}&:idanexo={$this->data->idanexo}";
            if ($this->update($query, $params)) {
                $this->message = "Anexo atualizado com sucesso!";
            } else {
                $this->message = "Ooops, algo deu errado";
            }
        }

        // Insert
        if (empty($this->data->idanexo)) {

            if ($this->findByArquivo($this->data->arquivo)) {
                $this->message = "Anexo já cadastrado!";
                return null;
            }
            $query = "INSERT INTO anexo  
            (id_chamado, arquivo, descricao) 
            VALUES (:id_chamado, :arquivo, :descricao)";
            $params = ":id_chamado={$this->data->id_chamado}&:arquivo={$this->data->arquivo}&:descricao={$this->data->descricao}";
            $idanexo = $this->create($query, $params);
            if (!$idanexo) {
                $this->message = "Ooops, não foi possível cadastrar o anexo!";
            } else {
                $this->data->idanexo = $idanexo;
                $this->message = "Anexo cadastrado com sucesso!";
            }
        }

        return $this;
    }

    // Pesquisar anexo por arquivo
    public function findByArquivo(string $arquivo): ?AnexoModel
    {
        $query  = "SELECT * FROM anexo WHERE arquivo = :arquivo";
        $params = ":arquivo={$arquivo}";
        $stmt   = $this->read($query, $params);
        if ($this->getFail() || !$stmt->rowCount()) {
            return null;
        }
        return $stmt->fetchObject(__CLASS__);
    }

    public function all(): ?array
    {
        /**
         * O método all realiza a listagem de todos os anexos cadastrados na tabela anexo.
         * @return null|array.
         */
        $query  = "SELECT * FROM anexo";
        $stmt   = $this->read($query);
        if ($this->getFail() || !$stmt->rowCount()) {
            $this->message  = "Banco de dados vazio!";
            echo "Banco de dados vazio!";
            return null;
        }
        return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function destroy()
    {
        $query   = "DELETE FROM anexo WHERE idanexo = :idanexo";
        $params  = ":idanexo={$this->data->idanexo}";
        if ($this->delete($query, $params)) {
            $this->message  = "Anexo deletado com sucesso!";
            $this->data     = null;
        }
        return true;
    }

    private function required(): bool
    {
        if (empty($this->data->id_chamado) || empty($this->data->arquivo)) {
            $this->message = "Verifique o correto preenchimento dos campos!";
            return false;
        }
        return true;
    }
}
