<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/blog.css') ?>">
  <script type="text/javascript" src="<?= base_url('/public/assets/js/senate.js') ?>"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Aboutus</title>
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
      <a href="<?= base_url('postblogpg') ?>"><button type="button">Report</button></a>
    </section>
  </nav>

  <footer class="footer">
    <p>Website copyright &#169; 2024</p>
  </footer>
</body>

</html>