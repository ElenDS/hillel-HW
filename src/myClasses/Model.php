<?php

declare(strict_types=1);

namespace App\myClasses;

abstract class Model
{
    public static int $count = 0;

    public static function find(int $id): static
    {
        $obj = new static();
        $obj->id = $id;
        echo 'SELECT * FROM ' . static::class . ' WHERE id = ' . $id . PHP_EOL;
        return $obj;
    }

    protected function create(): string
    {
        $idNewObj = ++self::$count;
        return 'INSERT INTO ' . static::class . ' (id, name, email) VALUES (' . $idNewObj . ', ' . $this->name . ', ' . $this->email . ')';
    }

    protected function update(): string
    {
        return 'UPDATE ' . static::class . ' SET name = ' . $this->name . ' email = "email" WHERE id = ' . $this->id;
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
        return 'DELETE user WHERE id = ' . $this->id;
    }
}
