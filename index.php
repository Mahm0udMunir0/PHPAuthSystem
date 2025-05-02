<?php
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['resgiter_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';
session_unset();
function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';

}
function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'active' : '' ;


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-box active  <?php isActiveForm('login',$activeForm); ?> " id="login-form">
            <form action="landr.php" method="post">
                <h2>Login</h2>
                <?php showError($errors['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>

            </form>

        </div>
        <div class="form-box   <?php isActiveForm('register',$activeForm); ?>" id="register-form">
            <form action="landr.php" method="post">
                <h2>Register</h2>
                <?php showError($errors['register']); ?>
                <input type="name" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>

            </form>

        </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>