<?php
define('USER_FILE', 'users.txt');

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function register($username, $email, $password) {
    if (!validateEmail($email)) {
        echo "Invalid email \n";
        return;
    }
    if (!file_exists(USER_FILE)) {
        touch(USER_FILE);
    }

    $users = file(USER_FILE, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        $userData = explode(",", $user);
        if ($userData[1] == $email) {
            echo "This email is already registered.\n";
            return;
        }
    $userData = "$username,$email,$password\n";
    file_put_contents(USER_FILE, $userData, FILE_APPEND);
    
}
    echo "Registration successful.\n";
}
function login($email, $password) {
    if (!file_exists(USER_FILE)) {
        echo "No users found. Please register first.\n";
        return;
    }


    $users = file(USER_FILE, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        $userData = explode(",", $user);
        if ($userData[1] == $email) {
            if ($password== $userData[2]) {
                echo "Login successful.\n";
                return;
            } else {
                echo "incorrect password\n";
                return;
            }
        }
    }

    echo "no user with this email , register noww\n";
}
echo "1. Register\n2. Login\n3. Exit\n";

$choice = readline("Choose an option : ");

switch ($choice) {
    case 1:
        $username = readline("Enter username: ");
        $email = readline("email: ");
        $password = readline("password: ");
        register($username, $email, $password);
        break;

    case 2:
        $email = readline("Enter email: ");
        $password = readline("enter password: ");
        login($email, $password);
        break;

    case 3:
        echo "bye..\n";
        exit();

    default:
        echo "invalid option\n";
}

?>
