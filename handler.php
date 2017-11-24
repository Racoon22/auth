<?php
require('core/db.php');
require("core/functions.php");

if (isset($_FILES['photos'])) {
    $file = $_FILES['photos'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $img_ext = ['jpeg', 'jpg', 'png', 'gif'];
    if (!in_array($ext, $img_ext)) {
        $data['error']['photo'] = 'Фаил не картинка';
    } else {
        $user = $DBH->query(
            "SELECT id FROM users ORDER BY id DESC LIMIT 1;
");
        $userID = $user->fetch();
        $newName = $userID['id'].'.' .$ext;
        $path = "public/uploads/$newName";
        if(!move_uploaded_file($file['tmp_name'], $path)){
            $data['error']['photo'] = 'Неудалось загрузить файл';
        } else {
            session_start();
            $_SESSION['photo'] = $newName;
        }
    }
    if (isset($data['error'])) {
        $response = ['status' => false,
            'errors' => $data['error']
        ];
    } else {
        $response = ['status' => true,
        ];
    }
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}


