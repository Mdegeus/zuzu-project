<?php  

require "../modules/connection.php";
require "../modules/Products.php";
require "../modules/ShoppingCart.php";
require "../modules/Users.php";

session_start();

if (!isset($_SESSION['shoppingcart'])) {
    $_SESSION['shoppingcart'] = array();
}


$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);

include_once "../templates/defaults/head.php";
include_once "../templates/defaults/navbar.php";

if (isset($_GET['message'])) {


    switch ($_GET['message']) {
        case 'userexists':
            $message = "This email is already in use. Please use another or " . "<a href='/login'>login</a>";
            $color = "wrong";
            break;
        case 'loginsucces':
            $message = "You successfully logged in";
            $color = "succes";
            break;
        case 'acountsucces':
            $message = "Your acount has been successfully created";
            $color = "succes";
            break;
        case 'wrongamount':
            $message = "Your requested items are not available, Try requesting more then 0 and not more than the current stock";
            $color = "wrong";
            break;
        default:
            $message = $_GET['message'] . " is not valid. Now how did it get there? 
            You trying to hack this site or something? 
            Unfortunatly for you i have encountered such bullshit as this. 
            So that means you stink :)";
            $color = "wrong";
            break;
    }

    echo "<div class='messageBox-parent'>";
    echo "<div class='messageBox $color' >";
    echo "<p>";
    echo $message;
    echo "</p>";
    echo "</div>";
    echo "</div>";
}

switch($params['1']) {
    case 'register':
        include_once "../templates/register.php";
        break;
    case 'login':
        include_once "../templates/login.php";
        break;
    case 'action':
        include_once "./forms/action.form.php";
        break;
    case 'shoppingcart':
        if (isset($_SESSION['user'])) {
            $userid = $_SESSION['user']->id;
            $shoppingcart = GetShoppingCart($userid);
            $orders = GetPlacedOrders($userid);
            include_once "../templates/shoppingcart.php";
        } else {
            echo "<h1 class='text-center'>Please login<h1>";
        }
        break;
    case 'home':
        $products = GetProducts();
        include_once "../templates/home.php";
        break;
    default:
        $products = GetProducts();
        include_once "../templates/home.php";
        break;
}