<?php

declare(strict_types=1);

namespace App;

use App\myClasses\User;
use App\myClasses\Blog;

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

$blog = Blog::find(2);
var_dump($blog);

$blog->setTitle('New title');
$result = $blog->save();
var_dump($result);

$result = $blog->delete();
var_dump($result);

$blog = new Blog();
$blog->setAuthor('Smith');
$blog->setTitle('Healthy Lifestyle');
$blog->setCategory('health');
$result = $blog->save();
var_dump($result);
