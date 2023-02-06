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
        echo 'SELECT ' . $col . ' FROM ' . explode('\\', static::class)[2] . ' WHERE id = ' . $id . PHP_EOL;
        return $obj;
    }


    protected function create(): string
    {
        $col = implode(', ', array_keys(get_object_vars($this)));
        $vars = implode(', ', array_values(get_object_vars($this)));
        return 'INSERT INTO ' . explode('\\', static::class)[2] . ' (' . $col . ') VALUES (' . $vars . ')';
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

        return 'UPDATE ' . explode('\\', static::class)[2] . ' SET ' . $sql . ' WHERE id = ' . $this->id;
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
        return 'DELETE FROM ' . explode('\\', static::class)[2] . ' WHERE id = ' . $this->id;
    }
}
