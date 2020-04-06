<template>
<div>
	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<!-- left column -->
				<div class="col-6">
					
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Add New Category</h3>
							</div>
							<form role="form" @submit.prevent="addCategory()">
								<div class="card-body">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Category Name</label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="categoryId" name="cat_name" placeholder="Category Name" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
											<has-error :form="form" field="cat_name"></has-error>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" class="btn btn-info">Save</button>
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
		name: "New",
		data(){
			return {
      form: new Form({
        cat_name: ''
      })
    }

		},
		methods:{
			addCategory(){
				this.form.post('/add-category')
        		.then(({ response }) => { 
        			this.$router.push('/category-list')

					Toast.fire({
					  icon: 'success',
					  title: 'category Added successfully'
					})
        		})
			}
		}
	}
</script>