<?php
// стартуем сессию, чтобы мы могли передавать ошибку в форму 
session_start();

// если пользователь не авторизован, у него не созданы куки,
// если кука с id пользователя пустая, то перенаправляем его на авторизацию
if(empty($_COOKIE['id_user'])) {
    $_SESSION['errLogin'] = "Авторизуйтесь!";
    header("Location: ../index.php");
}

// подключим БД
require_once("../db/db.php");

// запишем в переменные данные из формы
$id_owner = $_POST['id_owner'];
$id_client = $_POST['id_client'];
$id_const = $_POST['id_const'];
$id_struct = $_POST['id_struct'];

// отправим запрос в БД, на вставку данных в таблицу, данных, 
// которые мы передали из формы
mysqli_query($link, "INSERT INTO `approve_struct`
                    (`id_owner`, `id_client`, `id_const`, `id_struct`) 
                    VALUES 
                    ('$id_owner','$id_client','$id_const','$id_struct')
");

// отправим запрос в БД, на обновление данных, а именно, сделаем так, чтобы эта квартира,
// была занята и в нее нельзя была попасть
mysqli_query($link, "UPDATE `structure` SET `free`= 1 WHERE `id` = '$id_struct'");

// перенаправим на страницу здания, к которому пренадлежит эта квартира
header("Location: ../construction.php?id=" . $id_const);
?>