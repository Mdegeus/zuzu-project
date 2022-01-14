<?php

    if (!isset($_POST['action'])) { die("You are not supposed to be here. Move Bitch"); }

    switch ($_POST['action']) {
        case 'logout':

            $_SESSION['user'] = null;

            header("Location: /home");
            
            break;
        case 'loginuser':

            if (isset($_POST['email']) && isset($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $_SESSION['user'] = LoginUser($email, $password);

                if (isset($_SESSION['user'])) {
                    header("Location: /?message=loginsucces");
                }
            }

            
            break;
        case 'createuser':

            if (isset($_POST['fname'])) {
                $fname = $_POST['fname'];
            }

            if (isset($_POST['lname'])) {
                $lname = $_POST['lname'];
            }

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            if (isset($_POST['city'])) {
                $city = $_POST['city'];
            }

            if (isset($_POST['adress'])) {
                $adress = $_POST['adress'];
            }

            if (isset($_POST['zipcode'])) {
                $zipcode = $_POST['zipcode'];
            }

            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            $succes = CreateUser($fname, $lname, $email, $city, $adress, $zipcode, $password);

            if ($succes) {
                header("Location: /?message=acountsucces");
            } else {
                header("Location: /?message=userexists");
            }
            break;
        case 'placeOrder':
            global $userid;
            PlaceOrder($userid);
            header("Location: /shoppingcart");
            break;
        case 'removeFromCart':
            break;
        case 'addToCart':
            $id = $_GET['id'];
            if (isset($_POST['requestamount']) && $_POST['requestamount'] > 0) {
                $amount = $_POST['requestamount'];
            } else {
                header("Location: /?message=wrongamount");
            }

            $succes = AddItemToShoppingCart($id, $amount);

            if ($succes != true) {
                header("Location: /?message=wrongamount");
                break;
            }

            header("Location: /home");
            break;
        default: 
            header("Location: /");
            break;
    }