<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIKART - Templates</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html-include/0.3.0/include.min.js"></script>
</head>
<body>

<header>
    <div class="logo"><img src=".\assets\uikart-removebg-preview.png"></div>&nbsp;&nbsp;
    <div class="nav-links">
        <a href="index.php">HOME</a>
        <a href="about.html">ABOUT US</a>
        <a href="community.html">COMMUNITY</a>
    </div>
    <div class="search-container">
            <input
                type="text"
                id="searchInput"
                placeholder="Search templates..."
                oninput="liveSearch()"  
                 
            >
            <div id="suggestions" class="suggestion-box"></div>
        </div>
    <div class="auth-links">
        <?php if (isset($_SESSION['email'])): ?>
            <div class="profile-menu">
                <i class="fa-solid fa-user-circle"></i>
                <div class="dropdown">
                    <p><?php echo htmlspecialchars($_SESSION['firstName'] . " " . $_SESSION['lastName']); ?></p><br>
                    <a href="logout.php"><button>Logout</button></a>
                </div>
            </div>
        <?php else: ?>
            <a href="form.php" class="sign-up">SIGN IN/SIGN UP</a>
        <?php endif; ?>
    </div>
</header>

<main>
    <div data-include="components/home.html"></div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load components dynamically
        document.querySelectorAll('[data-include]').forEach(el => {
            let file = el.getAttribute('data-include');
            fetch(file)
                .then(response => response.ok ? response.text() : Promise.reject('File not found: ' + file))
                .then(html => el.innerHTML = html)
                .catch(error => console.error(error));
        });
    });
</script>
<script src="script.js"></script>
<style>
    /* Styles for the profile dropdown */
    .profile-menu {
        position: relative;
        cursor: pointer;
    }
    .profile-menu .dropdown {
        display: none;
        position: absolute;
        top: 30px;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
    }
    .profile-menu:hover .dropdown {
        display: block;
    }
    .profile-menu i {
        font-size: 24px;
    }
    .dropdown a{
        margin-top: 2px;
        background-color: black;
        color:white;
        width: auto;
    }
</style>

</body>
</html>