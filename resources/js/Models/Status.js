class Status{
	static all(then){
		return axios.get('/statuses')
			.then(response => then(response.data))
		;
	}
}

export default Status;