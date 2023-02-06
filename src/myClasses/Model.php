<?php

declare(strict_types=1);

namespace App\myClasses;

abstract class Model
{
    public static function find(int $id): static
    {
        $col = implode(', ', array_keys(get_class_vars(static::class)));
        $obj = new static();
        $obj->id = $id;
        echo 'SELECT ' . $col . ' FROM ' . static::getTableName() . ' WHERE id = ' . $id . PHP_EOL;
        return $obj;
    }


    protected static function getTableName(): string
    {
        return explode('\\', static::class)[2];
    }

    protected function create(): string
    {
        $keys = array_keys(get_object_vars($this));
        $values = array_values(get_object_vars($this));
        $col = implode(', ', $keys);
        $vars = implode(', ', $values);
        return 'INSERT INTO ' . static::getTableName() . ' (' . $col . ') VALUES (' . $vars . ')';
    }


    protected function update(): string
    {
        $arrSql = [];
        foreach (get_object_vars($this) as $key => $value) {
            if ($key === 'id') {
                continue;
            }
            $arrSql[] = $key . ' = ' . $value;
        }
        $sql = implode(', ', $arrSql);

        return 'UPDATE ' . static::getTableName() . ' SET ' . $sql . ' WHERE id = ' . $this->id;
    }

    public function save(): string
    {
        if (isset($this->id)) {
            $sql = $this->update();
        } else {
            $sql = $this->create();
        }

        return $sql;
    }

    public function delete(): string
    {
        return 'DELETE FROM ' . static::getTableName() . ' WHERE id = ' . $this->id;
    }
}
