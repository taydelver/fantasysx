import axios from 'axios'

export default {
  namespaced: true,
  state: {
    events: [],
    contests: [],
    currentContest: null
  },
  getters: {
    events: (state) => state.events,
    contests: (state) => state.contests,
    currentContest: (state) => state.currentContest,
  },
  actions: {
    getEvents: async ({commit}) => {
      const res = await axios.get(`/api/v1/events`)
      commit('setEvents', res.data.data)
      return res.data.data
    },
    getContest: async ({commit}, id) => {
      const res = await axios.get(`/api/v1/contest/${id}`) 
      commit('setCurrentContest', res.data.data)
      return res.data.data
    },
  },
  mutations: {
    setEvents: (state, data) => state.events = data,
    setContests: (state, data) => state.contests = data,
    setCurrentContest: (state, data) => state.currentContest = data
  }
}