<?php

declare(strict_types=1);

function get_username(object $pdo, string $username) 
{
    $query = "SELECT username FROM data_user WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) 
{
    $query = "SELECT username FROM data_user WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user(object $pdo, string $username) 
{
    $query = "SELECT * FROM data_user WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_user(object $pdo, string $password, string $cpassword, string $username, string $email) 
{
    $query = "INSERT INTO data_user (username, email, password, cpassword) VALUES (:username, :email, :password, :cpassword);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    $hashedcPassword = password_hash($cpassword, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":cpassword", $hashedcPassword);
    $stmt->execute();
}