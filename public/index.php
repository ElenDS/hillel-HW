<?php

declare(strict_types=1);

namespace App;

use App\myClasses\User;

require_once '../vendor/autoload.php';


$user = User::find(1);
var_dump($user); // SELECT * FROM user WHERE id = :id

$user->setName('John');
$result = $user->save();
var_dump($result); // UPDATE user SET name = :name, email = 'email' WHERE id = :id

$result = $user->delete();
var_dump($result); // DELETE user WHERE id = :id

$user = new User();
$user->setName('John');
$user->setEmail('some@gmail.com');
$result = $user->save();
var_dump($result); // INSERT INTO user (id, name, email) VALUES (:id, :name, :email)