<template>
	<div>
		<section class="content">
			<div class="row justify-content-around">
				<div class="col-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Category List</h3>

							<button class="btn btn-primary float-right">
								<router-link to="/add-category" style="color: #ffff">Add Category</router-link>
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Category Name</th>
										<th width="200px">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Internet</td>
										<td width="200px">
											<button class="btn btn-primary btn-sm">Edit</button>
											<button class="btn btn-danger btn-sm">Delete</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
		</section>
	</div>
</template>