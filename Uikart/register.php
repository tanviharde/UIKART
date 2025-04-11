<?php
session_start();
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 🔹 SIGN-UP LOGIC
    if (isset($_POST['signUp'])) {
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];
        $password = md5($_POST['password']); // ❗ Storing passwords with MD5 is insecure (use bcrypt)

        // Check if email exists
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows > 0) {
            echo "<script>alert('❌ Email Address Already Exists!');</script>";
            echo "<script>window.location.href='form.php?signup=true';</script>";
            exit();
        } else {
            $insertQuery = "INSERT INTO users (firstName, lastName, email, password) 
                            VALUES ('$firstName', '$lastName', '$email', '$password')";

            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('✅ Registration successful! Please sign in.');</script>";
                echo "<script>window.location.href='form.php';</script>";
                exit();
            } else {
                echo "❌ Error inserting user: " . $conn->error;
            }
        }
    } 

    // 🔹 SIGN-IN LOGIC (Fixing Undefined Array Key Error)
    elseif (isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']); 

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); // ✅ Fetch user data

            // 🔥 Store user details in session
            $_SESSION['email'] = $user['email'];
            $_SESSION['firstName'] = $user['firstName']; // ✅ Fixes undefined key issue
            $_SESSION['lastName'] = $user['lastName'];

            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect Email or Password.');</script>";
            echo "<script>window.location.href='form.php';</script>";
        }
    }
}
?>
