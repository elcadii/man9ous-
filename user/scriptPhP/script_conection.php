<?php
include("../confige/DbConnect.php");


// array for errors 
$errors = [];
$adminRow = null;

// function to log in 
if (isset($_POST['loginbtn'])) {
    $email = trim($_POST["email"]);
    $password = $_POST['password'];

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        $userQuery = "SELECT * FROM users WHERE email = :email";
        $userStmt = $pdo->prepare($userQuery);
        $userStmt->bindParam(':email', $email);
        $userStmt->execute();
        $userRow = $userStmt->fetch(PDO::FETCH_ASSOC);

        if (!$userRow) {
            $adminQuery = "SELECT * FROM admin WHERE email_ = :email";
            $adminStmt = $pdo->prepare($adminQuery);
            $adminStmt->bindParam(':email', $email);
            $adminStmt->execute();
            $adminRow = $adminStmt->fetch(PDO::FETCH_ASSOC);
            
        }

        if ($userRow && password_verify($password, $userRow['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $userRow['user_id'];
            $_SESSION['name'] = $userRow['first_name'];
            $_SESSION['commune_id'] = $userRow['commune_id'];
            $_SESSION['role'] = 'user';
            //  echo "<pre>";
            // print_r($userRow);
            // echo "</pre>";
            // echo $_SESSION['commune_id'] ;
            // die();

            header("Location: ../index.php");
            exit();
        } elseif ($adminRow && password_verify($password, $adminRow['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['admin_id'] = $adminRow['admin_id'];
            $_SESSION['name'] = $adminRow['first_name'];
            $_SESSION['role'] = 'admin';
            $_SESSION['commune_id'] = $adminRow['commune_id'];
           
            header("Location: ../admin/ProblemSignaler.php");
            exit();
        } else {
            $errors['password'] = "Wrong password.";
        }
    } else {
        $errors['email'] = "Email not found.";
    }
}
// include("includes/header.php");
