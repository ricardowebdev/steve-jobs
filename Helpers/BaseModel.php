<?php

namespace Helpers;

use src\Conexao\Conexao;

class BaseModel extends Conexao
{
    private $con;

    public function __construct()
    {
        $this->con = self::getInstance();
    }

    public function executaQuery($sql, $params, $values, $select = false)
    {
        $prepare = $this->con->prepare($sql);

        foreach ($params as $param) {
            $prepare->bindValue(":$param", $values[$param]);
        }

        if ($prepare->execute()) {
            return $select ? $prepare->fetchAll(\PDO::FETCH_ASSOC) : "True";
        } else {
            return false;
        }
    }

    public function store($table, $params)
    {
        $sql   = "INSERT INTO $table (";

        foreach ($params as $field) {
            $sql .= $field.",";
        }

        $sql  .= "created_at) VALUES (";

        foreach ($params as $field) {
            $sql .= ":".$field.",";
        }

        $sql .= "now())";

        return $sql;
    }

    public function edit($table, $params)
    {
        $sql   = "UPDATE $table SET ";

        foreach ($params as $param) {
            if ($param != "id") {
                $sql .= "$param = :$param,";
            }
        }

        $sql .= "updated_at = now()
        		 WHERE id = :id";

        return $sql;
    }

    public function erase($table, $id)
    {
        $sql = "UPDATE $table SET status = 0,
								  updated_at = now() 
				WHERE id = $id";

        return $sql;
    }

    public function listing($table, $params, $where = '')
    {
        $sql = "SELECT ";

        foreach ($params as $param) {
            $sql .= $table.".$param,";
        }

        $sql .= "created_at
        		 FROM $table
        		 WHERE $table.status = 1 ";

        $sql .= !empty($where) ? " AND ".$where : '';
       
        return $sql;
    }
}
