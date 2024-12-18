<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $inicio = null, $rows_count = null)
    {
        $sql = "select * from {$table} order by id desc";

        if ($inicio >= 0 && $rows_count > 0) {
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }

    public function selectAllWithSearch($table, $column, $search)
    {
        $sql = "select * from {$table} WHERE {$column} LIKE '%{$search}%'";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
    public function select($table, $id)
    {
        $sql = "select * from {$table} where id = {$id} ";

        

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }  
    }


    public function countAll($table)
    {
        $sql = "select COUNT(*) from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaLogin($email, $senha)
    {
        $sql = sprintf('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'senha' => $senha
            ]);

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectOne($table, $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id LIMIT 1', $table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($table, $id, $parameters)
    {
        $setPart = implode(', ', array_map(function($param) {
            return $param . ' = :' . $param;
        }, array_keys($parameters)));

        $sql = sprintf('UPDATE %s SET %s WHERE id = :id', $table, $setPart);

        $parameters['id'] = $id;
    
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE %s',
            $table, 
            'id = :id'
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function exibirPost($imagem, $titulo, $nome, $texto ):void
    {
       $sql = "SELECT * FROM posts ORDER BY data_criacao DESC LIMIT 5";
       
    }
    
    public function selectOneWhere($table, $conditions)
    {
        $columns = array_keys($conditions);
        $placeholders = array_map(fn($col) => "{$col} = :{$col}", $columns);
        $whereClause = implode(' AND ', $placeholders);

        $sql = sprintf('SELECT * FROM %s WHERE %s LIMIT 1', $table, $whereClause);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($conditions);

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}