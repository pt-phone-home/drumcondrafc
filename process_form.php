<?php 

$name = '';
$email = '';
$teamName = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $teamName = $_POST['teamName'];
    $message = $_POST['message'];

    $errors = [];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $erros[] = 'Please enter a valid email address';
    }

    if ($name == '') {
        $errors[] = 'Please enter your name';
    }

    if ($message == '') {
        $errors[] = 'Please enter a message';
    }

    if (empty($errors)) {

    }
}