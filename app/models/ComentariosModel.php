<?php

namespace Source\Models;
use Source\Core\Model;


class DepartamentoModel extends Model

{
    
    public function view(): ?array
{
    $query = "SELECT * FROM v_departamento"; // Altere para o nome correto da sua view
    $stmt = $this->read($query);
    if ($this->getFail() || !$stmt->rowCount()) {
        return null;
    }
    return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
}

    public function save(): ?DepartamentoModel
    {  
        

        if (!$this->required()) {
            return null;
        }

        //Update
        if (!empty($this->data->iddepartamento)) { // !empty nega o valor atual da variavel, se ela estiver prencida o valor será false, e logo ela pode ser modificada por está preenchida
            //Verificar se o departamento pertence ao id fornecido
            
            $query = "UPDATE departamento SET 
                    nome = :nome, email = :email, telefone = :telefone
                WHERE iddepartamento = :iddepartamento";
            $params = ":nome={$this->data->nome}&:email={$this->data->email}&: telefone={$this->data->telefone}".
            "&:iddepartamento={$this->data->iddepartamento}";
            if ($this->update($query, $params)) {
                $this->message = "Atualizado com sucesso!";
            } else {
                $this->message = " algo deu errado";
            }
            
        }
        

        //Insert
        if (empty($this->data->iddepartamento)) { // empty verifica se a variavel está vazia, se o valor for true ela é inserida
           
            $query = "INSERT INTO departamento  
            (nome, email, telefone) 
            VALUES (:nome, :email, :telefone)";
            
            $params = ":nome={$this->data->nome}&:email={$this->data->email}&:telefone={$this->data->telefone}";
            $iddepartamento = $this->create($query, $params);
            if (!$iddepartamento) {
                $this->message = "Ooops, não foi possivel inserir! Verifique os dados!";
            } else {
                $this->data->iddepartamento = $iddepartamento;
                $this->message = "Dados inserido com sucesso!";
            }
        
        }

        return $this;
    }

    private function required(): bool
    {
        if (empty($this->data->nome) ||
          strlen($this->data->nome)>45 ||
          empty($this->data->email)    ||
          empty($this->data->telefone)) {
            $this->message = "Verifique o correto preenchemento dos campos!";
            return false;
        }

        return true;
    }

    public function all(): ?array
    {
        $query = "SELECT * FROM departamento";
        $stmt = $this->read($query);
        if ($this->getFail() || !$stmt->rowCount()) {
            return null;
        }
        return $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    public function destroy()
    {
        $query = "DELETE FROM departamento WHERE iddepartamento = :iddepartamento";
        $params = ":iddepartamento={$this->data->iddepartamento}";
        if ($this->delete($query, $params)) {
            $this->message = "departamento deletado com sucesso!";
           $this->data = null;
        }else{
            $this->message = "ocorreu uma falha";
            return $this;
        }
        return true;

    }
    // required = verificar se os vampos obrigatorios estao devidademte preenchidos
        //Nome varchar(45)
        //email float
        

   
}