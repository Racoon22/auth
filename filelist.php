<?php
require('core/db.php');

if (!isset($_COOKIE['login'])) {
    header('location: index.php');
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $deleteUser = $DBH->prepare(
        "UPDATE users SET photo = ''  WHERE id = :id;
");
    $deleteUser->execute([
        'id' => $_GET['id']
    ]);
}

$findUser = $DBH->query(
    "SELECT * FROM users;
");
$users = $findUser->fetchAll();

require('views/filelist.php');
