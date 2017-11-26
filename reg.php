<?php
require('core/db.php');
require("core/functions.php");

//if (isset($_COOKIE['login'])) {
//    header('location: list.php');
//}
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
        $login = $user->fetch();
        if (empty($login)) {
            $passoword = password_hash($data['password'], PASSWORD_DEFAULT);
            $user = $DBH->prepare(
                "INSERT INTO users (name, age, description, login, password)  VALUES (:nick, :age, :description,  :login, :password);
");
            if ($user->execute([
                'nick' => $data['name'],
                'age' => $data['age'],
                'login' => $data['login'],
                'password' => $passoword,
                'description' => $data['description'],
            ])) {
                $lastId = $DBH->lastInsertId();
                $id = isset($lastId) ? $lastId : 0;
                $_SESSION['id'] = $id;
                setcookie('login', $data['login'], time() + (86400 * 30));
                $response = [
                    'status' => true,
                ];
            } else {
                $error['wrong'] = 'Логин или пароль неправильный';
                $response = ['status' => false,
                    'errors' => $error
                ];
            }
        }
        else {
            $error['exist'] = 'Пользователь с таким логином уже зарегистрирован';
            $response = ['status' => false,
                'errors' => $error
            ];
        }
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
} else {
    require('views/reg.php');
}

