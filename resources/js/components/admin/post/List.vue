<template>
	<div>
		<section class="content">
			<div class="row justify-content-around">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Post List</h3>

							<button class="btn btn-primary float-right">
								<router-link to="" style="color: #ffff">Add Post</router-link>
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Category</th>
										<th>User</th>
										<th>Title</th>
										<th>Description</th>
										<th>Photo</th>
										<th width="200px">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(post,index) in allpost">
										<td>{{index+1}}</td>
										<td>Cat</td>
										<td>User</td>
										<td>{{post.title}}</td>
										<td>{{post.description}}</td>
										<td><img :src="post.photo" width="60" height="70"></td>
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

<script>
	export default {

		name: "List",

		mounted(){
			this.$store.dispatch('getAllpost')
		},
		computed:{
			allpost(){
				return this.$store.getters.getAllpost
			}
		},
		methods:{

		}
	}
</script>