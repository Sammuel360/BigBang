<?php

namespace Source\Models;

use Source\Core\Model;

class UsuarioModel extends Model
{
    /**
     * Salva ou atualiza um usuário no banco de dados.
     * @return UsuarioModel|null
     */
    public function save(): ?UsuarioModel
    {
        // Verifica se os campos obrigatórios estão preenchidos
        if (!$this->required()) {
            return null;
        }

        // Update
        if (!empty($this->data->id)) {
            $query = "UPDATE usuarios SET 
                    nome = :nome, email = :email, telefone = :telefone, 
                    endereco = :endereco, cidade = :cidade, estado = :estado, 
                    cep = :cep, senha = :senha
                WHERE id = :id";
            $params = [
                ':nome' => $this->data->nome,
                ':email' => $this->data->email,
                ':telefone' => $this->data->telefone,
                ':endereco' => $this->data->endereco,
                ':cidade' => $this->data->cidade,
                ':estado' => $this->data->estado,
                ':cep' => $this->data->cep,
                ':senha' => $this->data->senha,
                ':id' => $this->data->id
            ];

            if ($this->update($query, $params)) {
                $this->message = "Usuário atualizado com sucesso!";
            } else {
                $this->message = "Ooops, algo deu errado";
            }
        }

        // Insert
        if (empty($this->data->id)) {

            if ($this->findByEmail($this->data->email)) {
                $this->message = "Atenção: e-mail indisponível para cadastro!";
                return null;
            }
            $query = "INSERT INTO usuarios  
            (nome, email, telefone, endereco, cidade, estado, cep, senha) 
            VALUES (:nome, :email, :telefone, :endereco, :cidade, :estado, :cep, :senha)";
            $params = [
                ':nome' => $this->data->nome,
                ':email' => $this->data->email,
                ':telefone' => $this->data->telefone,
                ':endereco' => $this->data->endereco,
                ':cidade' => $this->data->cidade,
                ':estado' => $this->data->estado,
                ':cep' => $this->data->cep,
                ':senha' => $this->data->senha
            ];

            $id = $this->create($query, $params);
            if (!$id) {
                $this->message = "Ooops, não foi possível cadastrar o usuário!";
            } else {
                $this->data->id = $id;
                $this->message = "Usuário cadastrado com sucesso!";
            }
        }

        return $this;
    }

    /**
     * Pesquisa usuário por nome.
     * @param string $nome
     * @return UsuarioModel|null
     */
    public function findByNome(string $nome): ?UsuarioModel
    {
        $query  = "SELECT * FROM usuarios WHERE nome = :nome";
        $params = [':nome' => $nome];
        $stmt   = $this->read($query, $params);
        if ($this->getFail() || !$stmt->rowCount()) {
            return null;
        }
        return $stmt->fetchObject(__CLASS__);
    }

    /**
     * Lista todos os usuários cadastrados.
     * @return array|null
     */
    public function all(): ?array
    {
        $query  = "SELECT * FROM usuarios";
        $stmt   = $this->read($query);
        if ($this->getFail() || !$stmt->rowCount()) {
            $this->message  = "Banco de dados vazio!";
            return null;
        }
        return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * Deleta um usuário.
     * @return bool
     */
    public function destroy(): bool
    {
        $query   = "DELETE FROM usuarios WHERE id = :id";
        $params  = [':id' => $this->data->id];
        if ($this->delete($query, $params)) {
            $this->message  = "Usuário deletado com sucesso!";
            $this->data     = null;
        }
        return true;
    }

    /**
     * Verifica se os campos obrigatórios estão preenchidos.
     * @return bool
     */
    private function required(): bool
    {
        if (empty($this->data->nome) || empty($this->data->email) || empty($this->data->senha)) {
            $this->message = "Verifique o preenchimento dos campos obrigatórios!";
            return false;
        }
        return true;
    }

    /**
     * Pesquisa usuário por e-mail.
     * @param string $email
     * @return UsuarioModel|null
     */
    public function findByEmail(string $email): ?UsuarioModel
    {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $params = [':email' => $email];
        $stmt = $this->read($query, $params);
        if ($this->getFail() || !$stmt->rowCount()) {
            return null;
        }
        return $stmt->fetchObject(__CLASS__);
    }
}
