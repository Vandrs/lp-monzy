var LeadProvider = {
	post: function (param) {
		return axios.post('/api/leads', param);
	},
	delete: function (id) {
		return axios.delete('/api/leads/'+id);	
	}
};

export { LeadProvider };