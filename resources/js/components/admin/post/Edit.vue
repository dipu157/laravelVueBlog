<template>
	<div>
	<section class="content">
		<div class="container-fluid">
			<div class="row justify-content-around">
				<!-- left column -->
				<div class="col-8">
					
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Update Post</h3>
							</div>
							<form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
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
										<img :src="updateImage()" width="100" height="100">
										<has-error :form="form" field="photo"></has-error>
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
		
		data(){
			return {
				form: new Form({
					title: '',
					description: '',
					cat_id: '',
					photo: ''
				})
			}
		},
		mounted(){
			this.$store.dispatch("allCategory")
		},

		created(){
			axios.get(`/editpost/${this.$route.params.postid}`)
				.then((response)=>{
					this.form.fill(response.data.post)
				})
		},
		computed:{
			getallCategory(){
				return this.$store.getters.getCategory
			}
		},
			
		methods:{
			changePhoto(event){
			  let file = event.target.files[0];

			  if(file.size>1048576){
			  		Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: 'Image Size should less then 1 MB!',
						  footer: '<a href>Why do I have this issue?</a>'
						})
			  }else{
				  	let reader = new FileReader();
					  reader.onload = event => {
					  	this.form.photo = event.target.result
					  };

					  reader.readAsDataURL(file);
			  }
			  
			},
			updatePost(){ 
				this.form.post(`/update-post/${this.$route.params.postid}`)
					.then((response) => {
				this.$router.push('/post-list')
						Toast.fire({
						icon: 'success',
						title: 'Post Updated successfully'
						})
				})
				.catch(() =>{
				})
			},
			updateImage(){
				let img = this.form.photo;
				if(img.length>100){
					return this.form.photo
				}else{
					return "uploadimage/"+this.form.photo
				}
			}
		}
	}
</script>