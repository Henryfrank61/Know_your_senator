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

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
					
					<?php if (!empty($posts) && is_array($posts)):?>
					<?php foreach ($posts as $post): ?>
					
						<!-- Blog post-->
						<div class="col-lg-6">
							<div class="card mb-4">
								<a href="<?= base_url('post/view/' . $post['id']) ?>">
									<img class="card-img-top" src="<?= esc(base_url('public/uploads/') . $post['image']) ?>" alt="<?= esc($post['title']) ?>" style="width: 100%; height:300px"/>
								</a>
								<div class="card-body">
									<div class="small text-muted"><?= esc(date('F j, Y', strtotime($post['created_at']))) ?></div>
									<h4 class="card-title h4"><?= esc($post['title']) ?></h4>
									<p class="card-text"><?= esc($post['content']) ?></p>
									<a class="btn btn-primary" href="<?= base_url('post/view/' . $post['id']) ?>">Read more →</a>
								</div>
							</div>
						</div>
						
					<?php endforeach; ?>
            		
					<?php else: ?>
						<div class="col-lg-12">
							<p>No posts found.</p>
						</div>
					<?php endif; ?>

                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
						<?= $pager->links('group1', 'bs_pagination'); ?>
                    </ul>
                </nav>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
				<?php include APPPATH . 'Views/inc/sidebar.php'; ?>
            </div>
        </div>
    </div>

<?php include APPPATH . 'Views/inc/footer.php'; ?>