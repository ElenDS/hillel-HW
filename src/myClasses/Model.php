<?php

declare(strict_types=1);

namespace App\myClasses;

abstract class Model
{
    public static function find(int $id): static
    {
        $obj = new static();
        $obj->id = $id;
        echo 'SELECT * FROM user WHERE id = ' . $id . PHP_EOL;
        return $obj;
    }

    public function save(): string
    {
        if (isset($this->id)) {
            $sql = 'UPDATE user SET name = ' . $this->name . ' email = "email" WHERE id = ' . $this->id;
        } else {
            $sql = 'INSERT INTO user (id, name, email) VALUES (:id, ' . $this->name . ', ' . $this->email . ')';
        }

        return $sql;
    }

    public function delete(): string
    {
        return 'DELETE user WHERE id = ' . $this->id;
    }
}
