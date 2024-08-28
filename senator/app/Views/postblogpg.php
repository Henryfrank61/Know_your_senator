<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/postblogpg.css') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cambria:wght@300;400;500&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Post News</title>

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

  <script>
    function resetForm() {
      $("#image_preview").html("");
      return true;
    }
  </script>

  <div>
    <form>
      <form method="post" class="offset-md-2 col-md-8" enctype="multipart/form-data"></form>
      <h1>Report what's happening around you:</h1>
      <section id="contact">
        <div class="sectionheader">
          <h1>CONTACT</h1>
        </div>
        <article>
          <p>Please click on the message icon below to toggle post space:</p>
          <label for="checkcontact" class="contactbutton">
            <div class="mail"></div>
          </label><input id="checkcontact" type="checkbox">
          <form action="" method="post" class="contactform">
            <p class="input_wrapper"><input type="text" name="contact_nom" value="" id="contact_nom"><label
                for="contact_nom">NAME</label></p>
            <p class="input_wrapper"><input type="text" name="contact_email" value="" id="contact_email"><label
                for="contact_email">EMAIL</label></p>
            <p class="input_wrapper"><input type="text" name="contact_sujet" value="" id="contact_sujet"><label
                for="contact_sujet">SUBJECT</label></p>
            <p class="textarea_wrapper"><textarea name="contact_message" id="contact_message"></textarea></p>
            <div class="my-2">
              <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();"
                multiple />
            </div>
            <div>
              <input onclick="upload_files()" type="button" class="btn btn-primary" name='submit_image'
                value="Upload Multiple Image" />
              <input onclick="return resetForm();" type="reset" class="btn btn-danger" name='reset_images'
                value="Reset" />
            </div>
            <p class="submit_wrapper"><input type="submit" value="Submit"></p>
          </form>
        </article>
      </section>

      <div class="container">
        <div class="row">
    </form>
  </div>
  <hr>
  <div class="row" id="image_preview"></div>
  </div>
  </form>

  </div>


  <footer class="footer">
    <p>Website copyright &#169; 2024</p>
  </footer>

</body>

</html>