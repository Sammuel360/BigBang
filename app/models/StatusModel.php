<?php

namespace Source\Core;

class StatusModel extends Model
{
    protected $table = 'historico_status';

    /**
     * Adiciona uma atualização de status para um chamado.
     * 
     * @param int $chamado_id
     * @param string $status_anterior
     * @param string $status_atual
     * @return int|null O ID do novo registro ou null em caso de falha.
     */
    public function addStatusUpdate(int $chamado_id, string $status_anterior, string $status_atual): ?int
    {
        $query = "INSERT INTO {$this->table} (chamado_id, status_anterior, status_atual, data_hora)
                  VALUES (:chamado_id, :status_anterior, :status_atual, NOW())";
        $params = http_build_query([
            'chamado_id' => $chamado_id,
            'status_anterior' => $status_anterior,
            'status_atual' => $status_atual
        ]);
        return $this->create($query, $params);
    }

    /**
     * Obtém o histórico de status para um chamado específico.
     * 
     * @param int $chamado_id
     * @return array|null Array de resultados ou null em caso de falha.
     */
    public function getStatusHistory(int $chamado_id): ?array
    {
        $query = "SELECT * FROM {$this->table} WHERE chamado_id = :chamado_id ORDER BY data_hora DESC";
        $params = http_build_query(['chamado_id' => $chamado_id]);
        $stmt = $this->read($query, $params);

        if ($stmt) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return null;
    }

    /**
     * Obtém o status atual para um chamado específico.
     * 
     * @param int $chamado_id
     * @return string|null O status atual ou null em caso de falha.
     */
    public function getCurrentStatus(int $chamado_id): ?string
    {
        $query = "SELECT status_atual FROM {$this->table}
                  WHERE chamado_id = :chamado_id
                  ORDER BY data_hora DESC
                  LIMIT 1";
        $params = http_build_query(['chamado_id' => $chamado_id]);
        $stmt = $this->read($query, $params);

        if ($stmt) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['status_atual'] ?? null;
        }
        return null;
    }
}
