<?php include APPPATH . 'Views/inc/header.php'; ?>

<?php include APPPATH . 'Views/inc/navbar.php'; ?>

<!-- Page content-->
<div class="container mt-3">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Profile</h3>
                        </div>
                        <div class="card-body">

                            <?php
                                if(session()->getFlashData("success"))
                                {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole! <?= session()->getFlashData("success"); ?>.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                                }
                                else if(session()->getFlashData("error"))
                                {
                            ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Holy guacamole! <?= session()->getFlashData("error"); ?>.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                                }
                            ?>
                            <?php if (isset($isLoggedIn) && $isLoggedIn): ?>
                                <form id="commentForm" action="<?= base_url('user/profileUpdate'.$isLoggedIn["id"]) ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Your Username</label>
                                        <input type="text" value="<?= esc($isLoggedIn["username"]) ?>" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Your Email</label>
                                        <input type="email" value="<?= esc($isLoggedIn["email"]) ?>" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confrimPassword" class="form-label">Confrim Password</label>
                                        <input type="password" class="form-control" id="confrimPassword" name="confrimPassword" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            <?php else: ?>
                                <p>You need to <a href="<?= base_url('login') ?>">login </a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            
        </div>
    </div>
</div>

<?php include APPPATH . 'Views/inc/footer.php'; ?>