<?php

use App\Controllers\StudentController;

$dbConfig = include __DIR__ . '/../config/database.php';
$db = new PDO(
    "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
    $dbConfig['username'],
    $dbConfig['password']
);

$studentController = new StudentController($db);

$requestUri = strtok($_SERVER['REQUEST_URI'], '?');
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri == '/students' && $requestMethod == 'GET') {
    $studentController->index();
} elseif ($requestUri == '/students/create' && $requestMethod == 'GET') {
    $studentController->create();
} elseif ($requestUri == '/students/store' && $requestMethod == 'POST') {
    $studentController->store($_POST);
} elseif (preg_match('/\/students\/(\d+)\/edit/', $requestUri, $matches) && $requestMethod == 'GET') {
    $studentController->edit($matches[1]);
} elseif (preg_match('/\/students\/(\d+)\/update/', $requestUri, $matches) && $requestMethod == 'POST') {
    $studentController->update($matches[1], $_POST);
} elseif (preg_match('/\/students\/(\d+)\/delete/', $requestUri, $matches) && $requestMethod == 'GET') {
    $studentController->delete($matches[1]);
} else {
    echo "404 Not Found";
}
