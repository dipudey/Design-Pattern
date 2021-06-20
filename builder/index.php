<?php
require_once "QueryBuilder.php";
require_once "MysqlDriver.php";

function clientCode(QueryBuilder $queryBuilder)
{
    try{
        $query = $queryBuilder
                ->select("users", ["name", "email", "password"])
                ->where("age", 18, ">")
                ->where("age", 30, "<")
                ->limit(10, 20)
            ->get();
        print_r($query);
    } catch(\Exception $e) {
        print_r($e->getMessage());
    }
}


echo "Testing MySQL query builder:\n";
clientCode(new MysqlDriver());

echo "\n\n";
