export default {
  namespaced: true,
  state: {
    display_name: null,
    id: null,
    name: null,
    contests: []
  },
  getters: {
    displayName: (state) => state.display_name,
    contests: (state) => state.contests
  },
  actions: {
    getUserContests: async ({commit}, id) => {
      const res = await axios.get(`/api/v1/user/contests`)
      commit('setUserContests', res.data)
    },
  },
  mutations: {
    setUserData: (state, data) => {
      const keys = Object.keys(data)
      keys.forEach(k => {
        state[k] = data[k]
      })
    },
    setUserContests: (state, data) => state.contests = data
  }
}