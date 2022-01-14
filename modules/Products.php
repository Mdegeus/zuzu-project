<?php

function GetProducts()
{
    global $pdo;

    $stm = $pdo->prepare('SELECT * FROM products ORDER BY name');
    $stm->execute();

    $products = $stm->fetchAll(pdo::FETCH_CLASS);

    return $products;
}

function GetProduct($id)
{

    global $pdo;

    $stm = $pdo->prepare("SELECT * FROM products WHERE id = '$id'");
    $stm->execute();

    $product = $stm->fetchAll(pdo::FETCH_CLASS);

    return $product[0];
}