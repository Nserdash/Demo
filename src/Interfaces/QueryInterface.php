<?php

namespace Nik\Htdocs\Interfaces;

interface QueryInterface
{
    public function selectAll($table);
    public function select($table, $columns);
    public function insert($table, $values);
    public function update($table, $values);
    public function delete($table, $id = NULL);
    public function where($column,$operator,$value);
    public function customQuery($query);
}