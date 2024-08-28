<?php include APPPATH . 'Views/inc/header.php'; ?>

<?php include APPPATH . 'Views/inc/navbar.php'; ?>


<div class="container-xl">
	<div class="table-responsive d-flex flex-column">

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
				<strong>
					Holy guacamole! 
					<?= session()->getFlashData("error"); ?>.
				</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php
			}
		?>

		<?php if (session()->getFlashdata('validation_errors')): ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<ul>
					<?php foreach (session()->getFlashdata('validation_errors') as $error): ?>
						<li><?= esc($error) ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

	

		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Blog</h2>
					</div>
					<div class="col-sm-6">
						<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createPost"><i class="material-icons">&#xE147;</i> <span>Create New Post</span></button>
						<button type="button" class="delete_all_data btn btn-danger">
							<i class="material-icons">&#xE15C;</i> <span>Delete</span>
						</button>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Image</th>
						<th>Title</th>
						<th>Content</th>
						<th>Created On</th>
						<th>Updated On</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($posts)) {
						foreach ($posts as $post) {
					?>
							<tr>
								<input type="hidden" id="postId" name="id" value="<?= $post['id'] ?>">
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="data_checkbox" class="data_checkbox" name="data_checkbox" value="<?= $post['id'] ?>">
										<label for="data_checkbox"></label>
									</span>
								</td>
								<td><img src="<?= esc(base_url('public/uploads/') . $post['image']) ?>" class="thumbnail" style="width:100%; height:80px;"></td>
								<td><?= esc($post['title']) ?></td>
								<td><?= esc($post['content']) ?></td>
								<td><?= esc(date('F j, Y', strtotime($post['created_at']))) ?></td>
								<td><?= esc(date('F j, Y', strtotime($post['updated_at']))) ?></td>
								<td>
									<?php if (isset($isAdmin) && $isAdmin == 1): ?>
										<a href="#editPost" class="edit" data-bs-toggle="modal" data-bs-target="#editPost"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

										<?php if ($post['status'] == 1): ?>
											<a href="<?= base_url('post/changeStatus/').$post['id'].'/0' ?>" ><i class="material-icons" data-toggle="tooltip" title="Unpublish">&#xf01a;</i></a>
										<?php else: ?>
											<a href="<?= base_url('post/changeStatus/').$post['id'].'/1' ?>" ><i class="material-icons" data-toggle="tooltip" title="Publish">&#xe255;</i></a>
										<?php endif; ?>
									<?php endif; ?>

									<a href="<?= base_url('post/delete/').$post['id'] ?>">
										<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
									</a>
								</td>
							</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
			<div class="d-flex justify-content-center align-items-center">
				<ul class="pagination">
					<?= $pager->links('group1', 'bs_pagination'); ?>
				</ul>
			</div>
		</div>
	</div>
</div>


<!-- Create Post Modal -->
<div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<form id="createPost" action="<?= base_url() . 'post/create' ?>" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addPostLabel">Create Post</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="mb-3">
						<label for="image" class="form-label">Select Image</label>
						<input class="form-control" type="file" id="image" name="image">
					</div>
					<div class="mb-3">
						<label for="title" class="form-label">Title</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="mb-3">
						<label for="content" class="form-label">Content</label>
						<textarea class="form-control" id="content" name="content" rows="5" required></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add Post</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Edit Post Modal -->
<div class="modal fade" id="editPost" tabindex="-1" aria-labelledby="addPostLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<form id="editPost" action="<?= base_url() . 'post/saveEdit' ?>" method="POST" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addPostLabel">Edit Post</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<input class="form-control" type="hidden" id="editId" name="editId">
					<div class="mb-3">
						<label for="image" class="form-label">Select Image</label>
						<input class="form-control" type="file" id="image" name="image">
					</div>
					<div class="mb-3">
						<label for="title" class="form-label">Title</label>
						<input type="text" class="form-control" id="updateTitle" name="title" required>
					</div>
					<div class="mb-3">
						<label for="content" class="form-label">Content</label>
						<textarea class="form-control" id="updateContent" name="content" rows="5" required></textarea>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Edit</button>
				</div>
			</div>
		</form>
	</div>
</div>


<?php include APPPATH . 'Views/inc/footer.php'; ?>

<script>
	$(document).on('click', '.edit', function(e) {
		e.preventDefault();
		var id = $(this).parent().siblings()[0].value

		$.ajax({
			url: "<?= base_url(); ?>" + "post/getPost/" + id,
			method: "GET",
			success: function(result) {
				var res = JSON.parse(result);

				$("#editId").val(res.id);
				$("#updateTitle").val(res.title);
				$("#updateContent").val(res.content);

				console.log(JSON.parse(result));
			}
		})
	})

	$(document).on('click', '.delete_all_data', function(e) {
		var checkboxes = $(".data_checkbox:checked");
		console.log(checkboxes);

		if (checkboxes.length > 0) {
			var ids = [];
			checkboxes.each(function() {
				ids.push($(this).val());
			})
		}

		$.ajax({
			url: "<?= base_url(); ?>" + "post/deleteMultiPost",
			method: "POST",
			data: {
				ids: ids
			},
			success: function(result) {
				console.log(result);
				checkboxes.each(function() {
					$(this).parent().parent().parent().hide(1000);
				});
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
				let res = JSON.parse(xhr.responseText);
			},
		})
	})
</script>