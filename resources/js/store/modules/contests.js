export default {
  namespaced: true,
  state: {
    
  },
  getters: {
    
  },
  actions: {
    enterContest: ({state}, data) => {
      return axios.post(`/api/v1/selections/${data.id}/enter`, {
        rider_ids: data.riders
      })
    },
  },
  mutations: {
    
  }
}