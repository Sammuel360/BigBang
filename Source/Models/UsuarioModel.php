<?php

namespace Source\Models;

use Source\Core\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios'; // Nome da tabela

    public function save(array $data): ?bool
    {
        $this->data = (object) $data;

        if (!$this->required()) {
            return null;
        }

        // Atualização
        if (!empty($this->data->id)) {
            $query = "UPDATE {$this->table} SET
                nome = :nome, 
                email = :email, 
                telefone = :telefone,
                endereco = :endereco, 
                cidade = :cidade, 
                estado = :estado,
                cep = :cep, 
                senha = :senha
                WHERE id = :id";
            $params = http_build_query([
                'nome' => $this->data->nome,
                'email' => $this->data->email,
                'telefone' => $this->data->telefone,
                'endereco' => $this->data->endereco,
                'cidade' => $this->data->cidade,
                'estado' => $this->data->estado,
                'cep' => $this->data->cep,
                'senha' => $this->data->senha,
                'id' => $this->data->id
            ]);

            return $this->update($query, $params);
        } else {
            // Inserção
            if ($this->findByEmail($this->data->email)) {
                $this->message = "Atenção: e-mail indisponível para cadastro!";
                return null;
            }

            $query = "INSERT INTO {$this->table}
                (nome, email, telefone, endereco, cidade, estado, cep, senha)
                VALUES (:nome, :email, :telefone, :endereco, :cidade, :estado, :cep, :senha)";
            $params = http_build_query([
                'nome' => $this->data->nome,
                'email' => $this->data->email,
                'telefone' => $this->data->telefone,
                'endereco' => $this->data->endereco,
                'cidade' => $this->data->cidade,
                'estado' => $this->data->estado,
                'cep' => $this->data->cep,
                'senha' => $this->data->senha // Usando password_hash
            ]);

            $id = $this->create($query, $params);
            if (!$id) {
                $this->message = "Ooops, não foi possível cadastrar o usuário!";
                return null;
            } else {
                $this->data->id = $id;
                $this->message = "Usuário cadastrado com sucesso!";
                return true;
            }
        }
    }

    private function required(): bool
    {
        if (empty($this->data->nome) || empty($this->data->email) || empty($this->data->senha)) {
            $this->message = "Verifique o preenchimento dos campos obrigatórios!";
            return false;
        }
        return true;
    }

    public function findByEmail(string $email): ?UsuarioModel
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $params = "email={$email}";
        $stmt = $this->read($query, $params);
        if ($this->getFail() || !$stmt->rowCount()) {
            return null;
        }
        return $stmt->fetchObject(__CLASS__);
    }

    public function listAll(): ?array
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->read($query);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : null;
    }

    public function findById(int $id): ?UsuarioModel
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $params = "id={$id}";
        $stmt = $this->read($query, $params);
        if ($stmt && $stmt->rowCount()) {
            return $stmt->fetchObject(__CLASS__);
        }
        return null;
    }

    public function deleteById(int $id): bool
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $params = "id={$id}";
        return $this->delete($query, $params);
    }
}