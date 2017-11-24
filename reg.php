<?php
require('db.php');
require("functions.php");

if (isset($_COOKIE['login'])) {
    header('location: list.php');
}
session_start();

if (isset($_POST['login'])) {
    if ($_POST['token'] != session_id()) {
        die("Ах ты хитрая жопа!!");
    }
    $data = reg_validation();

    if (isset($data['error'])) {
        $response = ['status' => false,
            'errors' => $data['error']
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    } else {
        $user = $DBH->prepare(
            "SELECT login  FROM users Where login = :login;
");
        $user->execute([
            'login' => $data['login'],
        ]);
        $userID = $user->fetch();
        if (empty($userID)) {
            $user = $DBH->prepare(
                "INSERT INTO users (name, age, description, login, password, photo)  VALUES (:nick, :age, :description,  :password, :login, :photo);
");
            if (!$user->execute([
                'nick' => $data['name'],
                'age' => $data['age'],
                'login' => $data['login'],
                'password' => $data['password'],
                'description' => $data['description'],
                'photo' => $_SESSION['photo']
            ])) {
                $error['wrong'] = 'Логин или пароль неправильный';
                $response = ['status' => false,
                    'errors' => $error
                ];
                unlink($_SESSION['photo']);
                echo json_encode($response, JSON_UNESCAPED_UNICODE);
            }
        }
        setcookie('login', $data['login'], time() + (86400 * 30), "/");
        $response = ['status' => true,
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
} else {
    require('views/reg.php');
}

