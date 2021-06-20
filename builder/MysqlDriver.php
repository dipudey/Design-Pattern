<?php

require_once "QueryBuilder.php";

class MysqlDriver implements QueryBuilder
{
    protected $query;

    protected function reset(): void
    {
        $this->query = new \stdClass();
    }

    public function select(string $table, array $column)
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $column) . " FROM {$table}";
        $this->query->type = "select";
        return $this;
    }

    public function where(string $column, string $value, string $operator = "=")
    {
        if(!in_array($this->query->type,['select','update','delete'])) {
            throw new \Exception("WHERE can only be added in select, update or delete");
        }
        $this->query->where[] = "$column $operator '$value'";
        return $this;
    }


    public function limit(int $start, int $offset)
    {
        if(!in_array($this->query->type,['select'])) {
            throw new \Exception("Limit can only be added in select");
        }
        $this->query->limit = " LIMIT {$start},{$offset}";
        return $this;
    }

    public function get()
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }


        $sql .= ";";
        return $sql;
    }
}
