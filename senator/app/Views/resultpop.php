<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/resultpop.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Result</title>

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
      <a href="<?= base_url('postblogpg') ?>"><button type="button">Report</button></a>
    </section>
  </nav>

  <main>
    <div id="contact">
      <h2 id="contact-title">Profile</h2>

      <div id="contact-body">
        <!-- Honourable's Photo -->
        <img id="contact-pp" src="<?= esc(base_url('public/uploads/' . (isset($profile['image']) ? 'hor/' . $profile['image'] : 'noimage.png'))) ?>" alt="Honourable Photo" />

        <!-- Honourable's Name -->
        <span id="contact-name"><?= isset($profile['name']) ? $profile['name'] : "Null"  ?></span>

        <!-- Honourable's Party -->
        <span id="contact-party">Party: <?= isset($profile['party']) ? $profile['party'] : "Null" ?></span>

        <!-- Honourable's Description -->
        <span id="contact-desc">
          <br />
          <strong>Date of Birth:</strong> <?= isset($profile['date_of_birth']) ? $profile['date_of_birth'] : "Null" ?><br />
          <strong>Previous Offices:</strong> <?= isset($profile['previous_offices']) ? $profile['previous_offices'] : "Null" ?><br />
          <strong>Educational Background:</strong> <?= isset($profile['educational_background']) ? $profile['educational_background'] : "Null" ?><br />
          <strong>Phone Number:</strong> <?= isset($profile['phone_number']) ? $profile['phone_number'] : "Null" ?><br />
          <strong>Email:</strong> <?= isset($profile['email']) ? $profile['email'] : "Null" ?><br />
          <strong>Parliament Address:</strong> <?= isset($profile['parliament_address']) ? $profile['parliament_address'] : "Null" ?><br />
          <strong>Parliament Number:</strong> <?= isset($profile['parliament_number']) ? $profile['parliament_number'] : "Null" ?><br />
          <strong>Address:</strong> <?= isset($profile['address']) ? $profile['address'] : "Null" ?><br />
        </span>

        <!-- Social Media Icons (Example) -->
        <link rel="stylesheet" href="./social-media-icons.css">
        <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
        <div class="social-menu">
          <ul>
            <li><a href="https://facebook.com/" target="_blank"><i
                  class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://instagram.com/" target="_blank"><i
                  class="fab fa-instagram"></i></a></li>
            <li><a href="https://linkedin.com/in/" target="_blank"><i
                  class="fab fa-linkedin-in"></i></a></li>
            <li><a href="https://wa.me/<?= isset($profile['phone_number']) ? $profile['parliament_number'] : "Null" ?>"><i class="fab fa-whatsapp"
                  target="_blank"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </main>


  <footer class="footer">
    <p>Website copyright &#169; 2024</p>
  </footer>


</body>

</html>