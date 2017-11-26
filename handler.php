<?php
require('core/db.php');
require("core/functions.php");
session_start();

if (isset($_FILES['photos'])) {
    $file = $_FILES['photos'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $img_ext = ['jpeg', 'jpg', 'png', 'gif'];
    if (!in_array($ext, $img_ext)) {
        $data['error']['photo'] = 'Фаил не картинка';
    } else {
        $newName = $_SESSION['id']. '.' . $ext;
        $path = "public/uploads/$newName";
        if (!move_uploaded_file($file['tmp_name'], $path)) {
            $data['error']['photo'] = 'Неудалось загрузить файл';
        } else {
            $file = $DBH->prepare(
                "UPDATE users SET photo = :photo WHERE id = :id"
            );
            $file->execute([
                'id' => $_SESSION['id'],
                'photo' => $newName,
            ]);
        }
    }
    if (isset($data['error'])) {
        $response = ['status' => false,
            'errors' => $data['error']
        ];
    } else {
        $response = ['status' => true,
            'photo' => $newName
        ];
    }
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}


