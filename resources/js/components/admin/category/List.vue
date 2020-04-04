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
										<th>Date</th>
										<th width="200px">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(category,index) in getallCategory">
										<td>{{index+1}}</td>
										<td>{{category.name}}</td>
										<td>{{category.created_at | timeformat }}</td>
										<td width="200px">
											<button class="btn btn-primary btn-sm"><router-link style="color: #ffff" :to="`/edit-category/${category.id}`">Edit</router-link></button>
											<button @click.prevent="deletecategory(category.id)" class="btn btn-danger btn-sm">Delete</button>
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
	export default{

		name: "List",
		mounted(){
			return this.$store.dispatch("allCategory")
		},
		computed:{
			getallCategory(){
				return this.$store.getters.getCategory
			}
		},
		methods:{
			deletecategory(id){
				axios.get('/category/'+id)
				.then(()=>{
					this.$store.dispatch("allCategory")
					Toast.fire({
					  icon: 'success',
					  title: 'category Deleted successfully'
					})
				})
			}
		}
	}
</script>