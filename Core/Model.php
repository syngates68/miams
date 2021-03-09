<?php
namespace Core;

use PDO;

class Model
{
    private static $_db;

    public function __construct(array $data) {
        $this->load = new Loader($this);
        $this->hydrate($data);
    }

    public static function set_db(PDO $db) 
    {
        self::$_db = $db;
    }

    public static function db() 
    {
        return self::$_db;
    }

    public function hydrate(array $data) 
    {
        foreach($data as $key => $value) 
        {
            $method = 'set_'.$key;
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    protected static function _getAll($table, $alias = "", $where = "", $params = [])
    {
        if ($alias != "")
            $sql = "SELECT $alias * FROM $table $alias";
        else
            $sql = "SELECT * FROM $table";

        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";

        $s = self::db()->prepare($sql);

        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $r = $s->execute();

        $res = [];
        while ($line = $s->fetch())
        {
            array_push($res, static::buildModel($line));
        }

        return $res;
    }

    protected static function _getInner($table, $inner, $alias = "", $where = "", $params = [])
    {
        if ($alias != "")
            $sql = "SELECT $alias FROM $table";
        else
            $sql = "SELECT * FROM $table";

        if ($inner != "")
            $sql .= $inner;
        
        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";
        
        $s = self::db()->prepare($sql);

        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $r = $s->execute();

        $res = [];
        while ($line = $s->fetch())
        {
            array_push($res, static::buildInner($line));
        }

        return $res;
    }

    protected static function _getOne($table, $inner, $alias = "", $where = "", $params = [])
    {
        if ($alias != "")
            $sql = "SELECT $alias FROM $table";
        else
            $sql = "SELECT * FROM $table";

        if ($inner != "")
            $sql .= " ".$inner;

        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";
        
        $s = self::db()->prepare($sql);
        
        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $r = $s->execute();

        if ($inner != "")
        {
            $res = [];
            while ($line = $s->fetch())
            {
                array_push($res, static::buildInner($line));
            }

            return $res;
        }
        else
        {
            if ($r != false && $s->rowCount() > 0)
                return static::buildModel($s->fetch());
            else
                return false;
        }
    }

    protected static function _count($table, $alias = "", $where = "", $params = [])
    {
        if ($alias != "")
            $sql = "SELECT COUNT(*) as 'nb' FROM $table $alias";
        else
            $sql = "SELECT COUNT(*) as 'nb' FROM $table";
        
        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";

        $s = self::db()->prepare($sql);

        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $s->execute();
        $line = $s->fetch();
        return $line['nb'];
    }

    protected static function _delete($table, $where = "", $params = [])
    {
        $sql = "DELETE FROM $table";
        
        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";

        $s = self::db()->prepare($sql);

        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $s->execute();
        return $s->rowCount();
    }

    protected static function _update($table, $values = [], $where = "", $params = [])
    {
        $sql = "UPDATE $table SET";

        $start = true;

        foreach ($values as $p)
        {
            if (!$start)
                $sql .= ", ".$p['key']." = :".$p['key'];
            else
            {
                $sql .= " ".$p['key']." = :".$p['key'];
                $start = false;
            }
        }

        if ($where != NULL && $where != "")
            $sql .= " WHERE $where";

        $s = self::db()->prepare($sql);

        foreach ($values as $p)
        {
            if (isset($p['type']))
                $s->bindValue(":".$p['key'], $p['value'], $p['type']);
            else
                $s->bindValue(":".$p['key'], $p['value']);
        }

        foreach ($params as $p)
        {
            if (isset($p['type']))
                $s->bindValue($p['key'], $p['value'], $p['type']);
            else
                $s->bindValue($p['key'], $p['value']);
        }

        $s->execute();
        return $s->rowCount();
    }

    protected static function _insert($table, $values = [], $ignore = false)
    {
        if (!$ignore)
            $sql = "INSERT INTO $table (";
        else
            $sql = "INSERT IGNORE INTO $table (";
        
        $start = true;

        foreach ($values as $p)
        {
            if (!$start)
                $sql .= ", ".$p['key'];
            else
            {
                $sql .= " ".$p['key'];
                $start = false;
            }
        }

        $sql .= ") VALUES (";
        $start = true;

        foreach ($values as $p)
        {
            if (!$start)
                $sql .= ", :".$p['key'];
            else
            {
                $sql .= ":".$p['key'];
                $start = false;
            }
        }

        $sql .= ")";

        $s = self::db()->prepare($sql);

        foreach ($values as $p)
        {
            if (isset($p['type']))
                $s->bindValue(":".$p['key'], $p['value'], $p['type']);
            else
                $s->bindValue(":".$p['key'], $p['value']);
        }

        $r = $s->execute();

        return ['id' => self::db()->lastInsertId(), 'count' => ($r != false) ? $s->rowCount() : -1];
    }
}