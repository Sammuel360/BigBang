<?php

namespace Source\Models;

use Source\Core\Model;

class StatusModel extends Model
{
    protected $table = 'historico_status';

    // Método para salvar um novo status
    public function save($params): ?int
    {
        $query = "INSERT INTO {$this->table} (chamado_id, status_anterior, status_atual, data_hora, created_at, updated_at) VALUES (:chamado_id, :status_anterior, :status_atual, :data_hora, :created_at, :updated_at)";
        return $this->create($query, http_build_query($params));
    }

    // Método para buscar todos os status
    public function list(): ?array
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->read($query);
        return $stmt ? $stmt->fetchAll(\PDO::FETCH_ASSOC) : null;
    }

    // Método para buscar um status por ID
    public function find($id): ?\stdClass
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->read($query, http_build_query(['id' => $id]));
        return $stmt ? $stmt->fetch(\PDO::FETCH_OBJ) : null;
    }

    // Método para atualizar um status
    public function updateStatus($id, $params): ?bool
    {
        $query = "UPDATE {$this->table} SET chamado_id = :chamado_id, status_anterior = :status_anterior, status_atual = :status_atual, data_hora = :data_hora, created_at = :created_at, updated_at = :updated_at WHERE id = :id";
        return $this->update($query, http_build_query(array_merge($params, ['id' => $id])));
    }

    // Método para deletar um status
    public function deleteStatus($id): ?bool
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->delete($query, http_build_query(['id' => $id]));
    }
}