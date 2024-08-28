    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($title) && $title == 'Home') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('blog') ?>">Home</a>
                    </li>
                    

                    <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($title) && $title == 'Manage Post') ? 'active' : ''; ?>" href="<?= base_url('managePost') ?>">Manage Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($title) && $title == 'Profile') ? 'active' : ''; ?>" href="<?= base_url('profile')."/".$isLoggedIn['id'] ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>">logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($title) && $title == 'Register') ? 'active' : ''; ?>" href="<?= base_url('register') ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($title) && $title == 'Login') ? 'active' : ''; ?>" href="<?= base_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>