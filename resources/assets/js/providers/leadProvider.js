var LeadProvider = {
	post: function (param) {
		return axios.post('/api/leads', param);
	}
};

export { LeadProvider };