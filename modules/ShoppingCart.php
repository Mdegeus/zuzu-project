<?php

function GetShoppingCart()
{
    $items = $_SESSION['shoppingcart'];

    return $items;
}

function GetTotalShopingCart()
{
    $items = GetShoppingCart();

    $sum = 0;

    foreach ($items as $productID) {
        $product = GetProduct($productID);
        $sum += $product->price;
    }

    return $sum;
}

function GetPlacedOrders($userid)
{
    global $pdo;

    $sql = "SELECT *
    FROM orders
    WHERE orders.user = $userid";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $orders = $stm->fetchAll(pdo::FETCH_CLASS);

    return $orders;
}

function AddItemToShoppingCart($itemid, $requestamount)
{

    $item = GetProduct($itemid);

    if (($item->stock) >= $requestamount) {

        global $pdo;

        $updateSQL = "UPDATE products SET stock = (($item->stock)-$requestamount) WHERE id = $item->id";
        $stmt = $pdo->prepare($updateSQL);
        $result = $stmt->execute();

        if ($result) {
            for ($i = 0; $i < $requestamount; $i++) {
                $_SESSION['shoppingcart'][] = $item->id; 
            }
        }

        return $result;

    }
}

function GetOrder($order_id)
{
    global $pdo;

    $sql = "SELECT products.name, products.price, products.image
    FROM orders
    LEFT JOIN order_rule
    ON orders.id = order_rule.order_id
    INNER JOIN products
    ON order_rule.product_id = products.id
    WHERE orders.id = $order_id
    ";

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $products = $stm->fetchAll(pdo::FETCH_CLASS);

    return $products;
}

function PlaceOrder()
{

    global $pdo;

    $items = GetShoppingCart();

    if (count($items) == 0) {
        return false;
    }

    $userid = $_SESSION['user']->id;

    $orderSQL = "INSERT INTO orders (user, totalprice)
    VALUES($userid, 2.00)";

    $orderSTMT = $pdo->prepare($orderSQL);

    $orderSTMT->execute();

    $last_id = $pdo->lastInsertId();

    foreach ($items as $item) {

        $item = GetProduct($item);

        $order_ruleSQL = "INSERT INTO order_rule (order_id, product_id)
        VALUES($last_id, $item->id)";

        $order_ruleSTMT = $pdo->prepare($order_ruleSQL);

        $order_ruleSTMT->execute();

    }

    $_SESSION['shoppingcart'] = array();

    return $products;
}