class Expense{
	static all(then, page = 1){
		if (page > 1) {
			return axios.get('/expense?page='+ page)
				.then(response => then(response.data));
		}else{

			return axios.get('/expense')
				.then(response => then(response.data));
		}
	}

	static monthTotal(then){
		return axios.get('/expense-total')
			.then(response => then(response.data))
		;
	}
}

export default Expense;