<?php
// connect with datbase 
include("../confige/DbConnect.php");
// start script for inscription 

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["singup"])) {
    $first_name = trim($_POST['firstName']);
    $lastName  = trim($_POST['lastName']);
    $phone = trim($_POST['phone']);
    $cin = trim($_POST['cin']);
    $commune_id = $_POST['commune'];
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];

    // First name
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required.";
    }

    // LASt name
    if (empty($lastName)) {
        $errors['lastName'] = "Last name is required.";
    }

    // PHONE NUMBER
    if (empty($phone)) {
        $errors['phone'] = "phone number is required.";
    }

    // PHONE NUMBER
    if (empty($cin)) {
        $errors['cin'] = "cin number is required.";
    }

    if (empty($address)) {
        $errors['address'] = "adress is required.";
    }

    if (empty($commune_id)) {
        $errors['commune'] = " commune_id is required.";
    }

    // Email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = "Email already exists.";
        }
    }

    // Password
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    // Confirm password
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If not errors, insert into DB
    if (empty($errors)) {
        $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, CNI_number, address_, commune_id)
        VALUES (:first_name, :last_name, :email, :phone_number, :password, :cin, :address_, :commune_id)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'first_name' => $first_name,
            'last_name' => $lastName,
            'email' => $email,
            'phone_number' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'cin' => $cin,
            'address_' => $address,
            'commune_id' => $commune_id
        ]);

        // Get user and set session
        $stmt1 = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt1->execute([$email]);
        $user = $stmt1->fetch(PDO::FETCH_ASSOC);

        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['first_name'] = $user['first_name'];

        // header("Location: ../");
        exit();
    }
}
