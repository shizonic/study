<?php

ini_set('display_errors', true);

// setup the autoloading
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => '127.0.0.1:8889',
    'database'  => 'electricbass.ch',
    'username'  => 'root',
    'password'  => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
// use Illuminate\Events\Dispatcher;
// use Illuminate\Container\Container;
// $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
// $capsule->bootEloquent();


$articles = Capsule::select('SELECT * FROM article WHERE deleted = ? LIMIT 10', [0]);
foreach ($articles as $article) {
    echo printf('%d - %s<br>', $article->id, $article->title);
}

// Retrieve a single row
$article = Capsule::table('article')->where('deleted', 0)->first();
echo"<pre>";print_r($article);echo"</pre>";

// Retrieve a single column
$title = Capsule::table('article')->where('id', 1328)->value('title');
echo printf('%s<br>', $title);

// Retrieve a list of column values
$titles = Capsule::table('category')->pluck('name');

foreach ($titles as $title) {
    echo $title . " ";
}


// Using query builder
$articles = Capsule::table('article')
    ->where('deleted', '=', 0)
    ->limit(20)
    ->get();

foreach ($articles as $article) {
    echo printf('%d - %s<br>', $article->id, $article->title);
}

