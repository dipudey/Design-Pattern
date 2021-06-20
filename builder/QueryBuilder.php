<?php

/**
 * The Builder interface declares a set of methods to assemble an SQL query.
 */

interface QueryBuilder
{
    public function select(string $table, array $column);

    public function where(string $column, string $value, string $operator = "=");

    public function limit(int $start, int $offset);

    public function get();
}
