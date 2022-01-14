<?php

function CreateUser($fname, $lname, $email, $city, $adress, $zipcode, $password) {

    global $pdo;

    $password = PasswordEncrypt($password);

    if (!FindEmail($email)) {
        $sql = "INSERT INTO costumers (fname, lname, email, city, adress, zipcode, password)
        VALUES ('$fname', '$lname', '$email', '$city', '$adress', '$zipcode', '$password')";

        $pdo->exec($sql);

        return true;
    }

    return false;
}

function PasswordEncrypt($password)
{
    $hash = password_hash($password, 
          PASSWORD_DEFAULT);

    return $hash;
}

function Verify($input, $check) {
    $verify = password_verify($input, $check);
    return $verify;
}

function FindUser($fname, $lname) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM costumers WHERE email = '$email' AND fname = '$fname' AND lname = '$lname'");

    $query->execute();

    $objects = $query->fetchAll(PDO::FETCH_CLASS);

    if (isset($objects[0])) {
        return true;
    } else {
        return false;
    }
}

function FindEmail($email) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM costumers WHERE email = '$email'");

    $query->execute();

    $objects = $query->fetchAll(PDO::FETCH_CLASS);

    if (isset($objects[0])) {
        return $objects[0];
    } else {
        return false;
    }
}

function GetUserById($userid) {
    global $pdo;

    $query = $pdo->prepare("SELECT * FROM costumers WHERE id = '$userid'");

    $query->execute();

    $objects = $query->fetchAll(PDO::FETCH_CLASS);

    if (isset($objects[0])) {
        return $objects[0];
    }else { 
        return false;
    }
}

function LoginUser($email, $givenpassword) {

    global $pdo;

    $targetUser = FindEmail($email);

    if (!isset($targetUser)) { die('Couldn\'t find user'); }

    if ($targetUser == false) {die();}

    if (password_verify($givenpassword, $targetUser->password)) {
        return $targetUser;
    }
}