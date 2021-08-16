class Category{
	static all(then){
		return axios.get('/categories')
			.then(response => then(response.data))
		;
	}

	static recent(then){
		return axios.get('/categories/recent-used')
			.then(response => then(response.data))
		;
	}
}

export default Category;