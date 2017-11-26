<?php

function auth_validation()
{
    $data = xss_protect();
    if (empty($data['login'])) {
        $error['error']['login'] = 'Введите логин';
    };
    if (empty($data['password'])) {
        $error['error']['password'] = 'Введите пароль';
    };
    if (isset($error)) {
        return $error;
    }
    return $data;
}

function reg_validation()
{
    $data = xss_protect();
    if (empty($data['name'])) {
        $error['error']['name'] = 'Введите имя';
    };
    if (empty($data['age'])) {
        $error['error']['age'] = 'Введите возраст';
    };
    if (empty($data['description'])) {
        $data['description'] = '';
    };
    if (empty($data['login'])) {
        $error['error']['login'] = 'Введите логин';
    };
    if (empty($data['password'])) {
        $error['error']['password'] = 'Введите пароль';
    };
    if (empty($data['confirm_password'])) {
        $error['error']['confirm_password'] = 'Подтвердите пароль';
    };
    if ($data['password'] !== $data['confirm_password']) {
        $error['error']['confirm'] = 'Пароль не совпадает';
    };

    if (isset($error)) {
        return $error;
    }
    return $data;
}

function xss_protect() {
    $data = array();
    foreach ($_POST as $key => $val) {
        $data[$key] = strip_tags($val);
    }
    return $data;
}