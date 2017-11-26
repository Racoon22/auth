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
        $password = password_verify($_POST['password'], PASSWORD_DEFAULT);
        $user = $DBH->prepare(
            "SELECT login, password  FROM users Where login = :login;
");
        $user->execute([
            'login' => $_POST['login']
        ]);
        $user = $user->fetch();
        if (empty($user || !password_verify($_POST['password'], $user['password']))) {
            $error['wrong'] = 'Логин или пароль неправильный';
            $response = ['status' => false,
                'errors' => $password
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            $response = ['status' => true,
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }

    }
} else {
    require('views/index.php');
}

