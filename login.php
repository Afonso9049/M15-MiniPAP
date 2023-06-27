<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $password = stripslashes($_REQUEST['password']);
        $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
        // Check user is exist in the database
        $query = "SELECT * FROM `users` WHERE username=:username AND password=:password";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', md5($password), PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->rowCount();
        // Check if user is admin based on their username
        if ($username == "root") {
            $user['role'] = "admin";
        } else {
            $user['role'] = "user";
        }

        // Redirect the user to the appropriate page based on their role
        if ($user['role'] == 'admin') {
            header("Location: admin_page.php");
        } else {
            header("Location: user_page.php");
        }
    } else {
        ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
            <input type="password" class="login-input" name="password" placeholder="Password" />
            <input type="submit" value="Login" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">New Registration</a></p>
        </form>
        <?php
    }
    ?>
</body>

</html>