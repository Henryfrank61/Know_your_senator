<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/sign-in.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>Login Form</title>

    <style>
        body {
            background-image: url("<?= base_url('/public/assets/img/Screenshot (7).png') ?>");
            background-repeat: no-repeat;
            background-size: 100vw 100vh;
            min-height: 100vh;
            display: flex;
            margin: 0%;
            padding: 0%;
            align-items: center;
            flex-direction: column;
            flex-direction: row;
        }
    </style>

    <script type="text/javascript" src="<?= base_url('/public/assets/js/senate.js') ?>"></script>
</head>

<body>
    <nav class="navigation-menu">
        <div class="navigation-menu__overlay" onclick="toggleMenuClicked()"></div>
        <button type="button" class="hamburger-menu" onclick="toggleMenuClicked()">
            <span class="material-icons" id="open-icon">menu</span>
            <span class="material-icons" id="close-icon">close</span>
        </button>
        <img class="site-identity-logo"
            src="https://upload.wikimedia.org/wikipedia/commons/7/75/Seal_of_the_Senate_of_Nigeria.svg" alt="senatelogo"
            width="110px" height="50px">
        <section class="navigation-menu__labels">
            <a href="<?= base_url('') ?>"><button type="button">Home</button></a>
            <a href="<?= base_url('blog') ?>"><button type="button">Blog/News</button></a>
            <a href="<?= base_url('about-us') ?>"><button type="button">About Us</button></a>
            <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
                <a class="nav-link" href="<?= base_url('logout') ?>"><button type="button">Logout</button></a>
            <?php else: ?>
                <a href="<?= base_url('register') ?>"><button type="button">Sign Up</button></a>
                <a href="<?= base_url('login') ?>"><button type="button">Log In</button></a>
            <?php endif; ?>
        </section>
    </nav>

    <div class="wrapper">

        <?php
        if (session()->getFlashData("success")) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashData("success"); ?>.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        } else if (session()->getFlashData("error")) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= session()->getFlashData("error"); ?>.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
        }
        ?>

        <form action="<?= base_url('login') ?>" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Email" name="email" required>
                <box-icon type='solid' name='user'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <box-icon name='lock-alt' type='solid'></box-icon>
            </div>
            <div class="remember-forgot">
                <label for=""><input type="checkbox">Remember me</label>
                <a href="<?= base_url('forgotpassword') ?>">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="<?= base_url('register') ?>">Register</a></p>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <footer class="footer">
        <p>Website copyright &#169; 2024</p>
    </footer>

</body>

</html>