<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="<?= assets("/styles/registerstyle.css") ?>">
</head>

<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <div style="color:red"><?= $error ?></div>
        <form action="<?= url("register") ?>" method="POST">
            <div class="input-box">
                <input type="text" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input type="password" name="password_conf" placeholder="Confirm password" required>
            </div>
            <div class="policy">
                <input type="checkbox" name="tm">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Register Now">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="<?= url("login") ?>">Login now</a></h3>
            </div>
        </form>
    </div>
</body>

</html>