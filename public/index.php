<?php

declare(strict_types=1);

namespace App;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';


Category::upsert([
    ['title' => 'Finance'],
    ['title' => 'Policy'],
    ['title' => 'Medicine'],
    ['title' => 'Education'],
    ['title' => 'Science']
], ['title'], ['title']);

$categoryUpdate = Category::find(1);
$categoryUpdate->title = 'Finance and Business';
$categoryUpdate->save();

$category = Category::find(2);
$category->delete();

Post::upsert([
    ['title' => 'First Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Second Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Third Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Fourth Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Fifth Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Sixth Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Seventh Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Eighth Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Ninth Post Title', 'content' => 'some text', 'category_id' => 2],
    ['title' => 'Tenth Post Title', 'content' => 'some text', 'category_id' => 2]
], ['title', 'content', 'category_id'], ['title']);


$post = Post::find(1);
$post->title = 'Fist Post Title Was Edited';
$post->content = 'content was changed';
$post->category_id = 3;
$post->save();

$post->delete();


Tag::upsert([
    ['name' => 'news'],
    ['name' => 'news live'],
    ['name' => 'china'],
    ['name' => 'live today'],
    ['name' => 'health'],
    ['name' => 'advice'],
    ['name' => 'student journey'],
    ['name' => 'budget 2023'],
    ['name' => 'personal loan'],
    ['name' => 'environment']
], ['name'], ['name']);


$posts = Post::all();
$tags = Tag::all();
$posts->map(function ($post) use ($tags) {
    $post->tags()->attach($tags->random(3));
});


