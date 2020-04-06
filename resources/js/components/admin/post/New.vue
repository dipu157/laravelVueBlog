<template>
	<div>
	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<!-- left column -->
				<div class="col-8">
					
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Add New Post</h3>
							</div>
							<form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()">
								<div class="card-body">
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Post Title</label>
										<div class="col-md-9">
											<input type="text" class="form-control" id="titleId" name="title" placeholder="Post Title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
											<has-error :form="form" field="title"></has-error>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Post Description</label>
										<div class="col-md-9">

									        <markdown-editor v-model="form.description"></markdown-editor>

											<has-error :form="form" field="description"></has-error>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Category Name</label>
										<div class="col-md-9">
											<select class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
											<option value="" disabled selected>Select Category</option>
											<option :value="category.id" v-for="category in getallCategory">{{category.name}}</option>
										</select>
										<has-error :form="form" field="cat_id"></has-error>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label">Photo</label>
										<input @change = changePhoto($event) type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
										<img :src="form.photo" width="100" height="100">
										<has-error :form="form" field="photo"></has-error>
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
			return{
				form: new Form({
					title:'',
					description:'',
					cat_id:'',
					photo:'',
				})
			}
		},
		mounted(){
			return this.$store.dispatch("allCategory")
		},
		computed:{
			getallCategory(){
				return this.$store.getters.getCategory
			}
		},
		methods:{
			changePhoto(event){
			  var file = event.target.files[0];
			  var reader = new FileReader();
			  reader.onload = event => {
			  	this.form.photo = event.target.result
			  };

			  reader.readAsDataURL(file);
			},

			addnewPost(){
				this.form.post('/savepost')
					.then(({ response })=>{
						this.$router.push('/post-list')

						Toast.fire({
						  icon: 'success',
						  title: 'Post Added successfully'
						})
					})
					.catch(()=>{

					})
			},
		}
	}
</script>