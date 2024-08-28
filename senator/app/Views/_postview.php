<?php include APPPATH . 'Views/inc/header.php'; ?>

<?php include APPPATH . 'Views/inc/navbar.php'; ?>

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!">
                    <img class="card-img-top" src="<?= esc(base_url('public/uploads/').$post['image']) ?>" alt="<?= esc($post['title']) ?>" />
                </a>
                <div class="card-body">
                    <div class="small text-muted"> <?= esc(date('F j, Y', strtotime($post['created_at']))) ?></div>
                    <h4 class="card-title"><?= esc($post['title']) ?></h4>
                    <p class="card-text"><?= esc($post['content']) ?></p>

                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Comments</h3>
                        </div>
                        <div class="card-body">

                            <!-- Existing Comments Section -->
                            <div id="commentsSection">
                                <div class="comment mb-4">

                                    <?php if (!empty($comments) && is_array($comments)):?>
                                        <?php foreach ($comments as $comment): ?>
                                        <div class="col mb-3">
                                            <div>
                                                <h6 class="fw-bold mb-1">
                                                    <?= esc($comment['user_name']) ?>
                                                </h6>
                                                <p class="mb-0">
                                                    <?= esc($comment['comment']) ?>
                                                </p>
                                                <small class="text-muted">
                                                    <?= esc(date('F j, Y', strtotime($comment['created_at']))) ?>
                                                </small>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-lg-12">
                                            <h5>No comment added.</h5>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <hr>

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
                                <form id="commentForm" action="<?= base_url() . 'comment/add/'.$post['id'] ?>" method="POST">
                                    <input type="hidden" value="<?= esc($isLoggedIn["id"]) ?>" name="user_id" required>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">Your Username</label>
                                        <input type="text" value="<?= esc($isLoggedIn["username"]) ?>" class="form-control" id="userName" name="userName" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </form>
                            <?php else: ?>
                                <p>You need to <a href="<?= base_url('login') ?>">login </a> in to Comment</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <?php include APPPATH . 'Views/inc/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include APPPATH . 'Views/inc/footer.php'; ?>