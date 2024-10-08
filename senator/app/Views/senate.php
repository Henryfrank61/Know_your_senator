<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/public/assets/css/senate.css') ?>">
  <script type="text/javascript" src="<?= base_url('/public/assets/js/senate.js') ?>"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <header>
    <nav>
      <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
          <div class="nav-title">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/75/Seal_of_the_Senate_of_Nigeria.svg"
              alt="senatelogo" width="110px" height="50px">
          </div>
        </div>

        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>

        <div class="nav-links">
          <a href="<?= base_url('') ?>">Home</a>
          <a href="<?= base_url('blog') ?>">NEWS</a>
          <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
            <a class="nav-link" href="<?= base_url('logout') ?>"><button type="button">Logout</button></a>
          <?php else: ?>
            <a href="<?= base_url('register') ?>">Sign Up</a>
            <a href="<?= base_url('login') ?>">LogIn</a>
          <?php endif; ?>
          <a href="<?= base_url('postblogpg') ?>">Report</a>
          <a href="<?= base_url('aboutus') ?>">About Us</a>

        </div>
    </nav>
  </header>

  <main>
    <div class="container">

      <h2 id="top_left1">Who we are</h2>
      <h3 id="top_left2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore vero repellat esse maiores,
        architecto harum modi similique nobis laudantium delectus error. Nemo, quidem ducimus suscipit sint ullam
        eligendi aperiam culpa.</h3>
    </div>


    <div class="posts">
      <h1>Our aim and objective</h1>
      <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur illum autem natus illo error itaque quidem
        quasi aperiam aspernatur unde? Quasi voluptas consequatur perspiciatis ullam voluptatum magni impedit dolorem
        porro.</h3>
      <a href="#" class="style-4">Read More</a>
    </div>


    <!-- <div class="yes">
                        <label id="select">Select your State:</label>
                        
                        <select name="State" id="state">
                            <option value="">Abia</option>
                            <option value="">ADAMAWA</option>
                            <option value="">AKWA IBOM</option>
                            <option value="">ANAMBA</option>
                          </select>
                          <br>
                        <label id="select">Select Local Government Area:</label>
                        
                        <select name="LG" id="state">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                          </select>
                          <br>
                          <label id="select">Select You senatorial district:</label>
                      
                        <select name="district" id="state">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                          </select> 
                          <br>
                            <button class="eleven">View</button>
                        </div> -->
    <div>



    </div>
    <div class="know">
      <h1>Know your Legslatures:</h1>
      <nav>

        <button type="button" onclick="location.href='subsenate.html';" title="Senate">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
          </svg>
        </button>



        <button type="button" onclick="location.href='HOR.html';" title="House of representatives."">
                          <svg xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M13 5h8" />
          <path d="M13 9h5" />
          <path d="M13 15h8" />
          <path d="M13 19h5" />
          <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
          </svg>
        </button>

      </nav>
    </div>

  </main>


  </div>
  </div>


  </div>



  <!-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="./social-media-icons.css">
  <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>

  <footer class="footer">
    <div class="social-menu">
      <ul>
        <li><a href="https://github.com/sanketbodke" target="blank"><i class="fab fa-facebook-f"></i></i></a></li>
        <li><a href="https://www.instagram.com/imsanketbodke/" target="blank"><i class="fab fa-instagram"></i></a></li>
        <li><a href="https://www.linkedin.com/in/sanket-bodake-995b5b205/" target="blank"><i
              class="fab fa-linkedin-in"></i></a></li>
        <li><a href="https://codepen.io/sanketbodke"><i class="fab fa-whatsapp" target="blank"></i></a></li>
      </ul>
    </div>
    <p>Website copyright &#169; 2024</p>
  </footer>
  <!-- <footer>
                      <div class="rounded-social-buttons">
                                        <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        <a class="social-button tiktok" href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
                                        <a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                                        <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <h3>Website copyright &#169; 2024</h3>
                                    </div>               
                    </footer>

         -->

</body>

</html>