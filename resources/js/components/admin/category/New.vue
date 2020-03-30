<template>
<div>
	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<!-- left column -->
				<div class="col-md-6">
					<form role="form">
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Add Category</h3>
							</div>
							<form class="form-horizontal">
								<div class="card-body">
									<div class="form-group row">
										<label class="col-sm-2 col-form-label">Category Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" placeholder="Category Name">
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-info">Save</button>
								</div>
							</form>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
</template>