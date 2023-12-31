<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= assets("styles/loginstyle.css") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <h1></h1>
            <form action="<?= url("login") ?>" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Email or username" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>

                <button type="submit" class="btn btn-primary w-100 d-block"> submit</button>
                <span style="color:red;"></span>
                <div class="signup-link">Not a member? <a href="<?= url("register") ?>">Sign up now</a></div>
            </form>
        </div>
    </div>





</body>

</html>