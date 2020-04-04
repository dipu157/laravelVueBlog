export default {

	state:{
		category: [],
		post: [],
	},
	getters:{
		getCategory(state){
			return state.category
		},
		getAllpost(state){
			return state.post
		}
	},
	actions:{
			allCategory(context){
					axios.get('/category')
					.then((response)=>{
						context.commit('category',response.data.categories)
					})
			},
			getAllpost(context){
				axios.get('/post')
					.then((response)=>{
						context.commit('allpost',response.data.posts)
					})
			}
	},
	mutations:{
		category(state,data){	
			return state.category = data
		},
		allpost(state,data){
			return state.post = data
		}
	}
}