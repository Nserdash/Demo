<?php

namespace Nik\Htdocs\Interfaces;

interface QueryInterface
{
    public function selectAll($table);
    public function selectWhere($table, $where);
    public function insert($table, $values);
    public function update($table, $values, $id);
    public function delete($table, $id = NULL);
    public function customQuery(string $query);
}