<?php

namespace Source\Core;

class CategoriaModel extends Model
{
    protected $table = 'categoria';

    /**
     * Adiciona uma nova categoria.
     * 
     * @param string $nome Nome da categoria.
     * @return int|null O ID da nova categoria ou null em caso de falha.
     */
    public function addCategoria(string $nome): ?int
    {
        $query = "INSERT INTO {$this->table} (nome, created_at, updated_at)
                  VALUES (:nome, NOW(), NOW())";
        $params = http_build_query(['nome' => $nome]);
        return $this->create($query, $params);
    }

    /**
     * Obtém todas as categorias.
     * 
     * @return array|null Array de categorias ou null em caso de falha.
     */
    public function getAllCategorias(): ?array
    {
        $query = "SELECT * FROM {$this->table} ORDER BY nome ASC";
        $stmt = $this->read($query);

        if ($stmt) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return null;
    }

    /**
     * Obtém uma categoria pelo seu ID.
     * 
     * @param int $id O ID da categoria.
     * @return array|null Os dados da categoria ou null em caso de falha.
     */
    public function getCategoriaById(int $id): ?array
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $params = http_build_query(['id' => $id]);
        $stmt = $this->read($query, $params);

        if ($stmt) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        return null;
    }

    /**
     * Atualiza o nome de uma categoria.
     * 
     * @param int $id O ID da categoria.
     * @param string $novo_nome O novo nome da categoria.
     * @return bool|null Retorna true em caso de sucesso, false em caso de falha, ou null em caso de erro.
     */
    public function updateCategoria(int $id, string $novo_nome): ?bool
    {
        $query = "UPDATE {$this->table} SET nome = :novo_nome, updated_at = NOW() WHERE id = :id";
        $params = http_build_query(['id' => $id, 'novo_nome' => $novo_nome]);
        return $this->update($query, $params);
    }

    /**
     * Exclui uma categoria pelo seu ID.
     * 
     * @param int $id O ID da categoria.
     * @return bool|null Retorna true em caso de sucesso, false em caso de falha, ou null em caso de erro.
     */
    public function deleteCategoria(int $id): ?bool
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $params = http_build_query(['id' => $id]);
        return $this->delete($query, $params);
    }
}
