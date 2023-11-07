<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $password, string $cpassword) 
{
    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) 
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) 
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_password_wrong(string $cpassword, string $hashedcPassword) 
{
    if (!password_verify($cpassword, $hashedcPassword)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $password, string $cpassword, string $username, string $email) 
{
    set_user($pdo, $password, $cpassword, $username, $email);
}