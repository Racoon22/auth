<?php
require('core/db.php');
require("core/functions.php");

session_start();
if (isset($_POST['login']) && isset($_POST['password']) && !$_POST['token'] = session_id()) {
    die("Ах ты хитрая жопа!!");
}

if (isset($_POST['login']) && isset($_POST['password'])) {
    $val = auth_validation();
    if (isset($val['error'])) {
        $response = ['status' => false,
                    'errors' => $val['error']
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = $DBH->prepare(
            "SELECT login, password  FROM users Where password = :password AND login = :login;
");
        $user->execute([
            'password' => $password,
            'login' => $_POST['login']
        ]);
        $userID = $user->fetch();
        if (!empty($userID)) {
            setcookie('login', $_POST['login'], time() + (86400 * 30), "/");
            header('location: list.php');
        }
        $error['wrong'] = 'Логин или пароль неправильный';
        $response = ['status' => false,
            'errors' => $error
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
} else {
    require('views/index.php');
}

