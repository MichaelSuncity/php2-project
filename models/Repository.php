<?php
namespace app\models;

use app\engine\App;
use app\models\entities\DataEntity;



abstract class Repository extends Models
{

 

    public function clearAllBySession($session)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE  FROM {$tableName} WHERE  session_id = :session";
        return App::call()->db->execute($sql, ['session'=> $session]);
    }

    public function deleteByIdWhere($id, $field, $value) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id and `$field`=:$field";
        return App::call()->db->execute($sql, ['id' => $id, "$field" => $value]);
    }
    
    
    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryOne($sql, ["$field" => $value])['count'];
    }

    
    public function getLimit($from, $to) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT  :from, :to";
        return App::call()->db->queryLimit($sql, $from, $to);
    }

    public function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryObject($sql, ["$field" => $value], $this->getEntityClass());
    }

    public function getArrayWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryAll($sql, ["$field" => $value]);
    }


    public function insert(DataEntity $entity) {
        $params = [];
        $columns = [];
        $tableName = $this->getTableName();
        foreach ($entity as $key => $value) {
            if ($key === "id" or $key === "changedProperties") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        //INSERT INTO `products`(`id`, `name`, `description`, `price`) VALUES (:name, ,[value-4])
       
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";
        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }


   public function update(DataEntity $entity) {
        $set = [];
        $params = [];
        foreach ($entity as $key => $value) {
             if ($key == 'id' or $key == 'changedProperties') continue;
                $set[] = "`$key`=:{$key}";
                $params[$key] = $value;
        }
        $set = implode(', ', $set);
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET {$set} WHERE (`id` = :id);";
        $params['id'] = $entity->id;
        $entity->changedProperties = [];
        return App::call()->db->execute($sql, $params);
    }

    public function save(DataEntity $entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
    
    public function delete($entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }

}