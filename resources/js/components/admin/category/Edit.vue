<template>
<div>
	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<!-- left column -->
				<div class="col-6">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Edit Category</h3>
						</div>
						<form role="form" @submit.prevent="updateCategory()">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-md-3 col-form-label">Category Name</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="categoryId" name="name" placeholder="Category Name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
										<has-error :form="form" field="name"></has-error>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-info">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</template>
<script>
	export default {
		name: "Edit",
		mounted(){
			axios.get(`/editcategory/${this.$route.params.categoryid}`)
				.then((response)=>{
					this.form.fill(response.data.category)
				})
		},
		data(){
			return {
				form: new Form({
					name: ''
				})
			}
		},
		methods:{
			updateCategory(){
				this.form.post(`/update-category/${this.$route.params.categoryid}`)
		.then((response) => {
			this.$router.push('/category-list')
					Toast.fire({
					icon: 'success',
					title: 'category Updated successfully'
					})
		})
		.catch(() =>{
		})
			}
		}
	}
</script>