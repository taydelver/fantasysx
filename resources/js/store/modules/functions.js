export default {
  namespaced: true,
  state: {
    pageLoaded: false
  },
  getters: {
    pageLoaded: (state) => state.pageLoaded
  },
  actions: {
    pageLoader: ({commit}) => {
      setTimeout(() => {
        commit('setPageLoaded', true)
      }, 300)
    }
  },
  mutations: {
    setPageLoaded: (state, status) => state.pageLoaded = state
  }
}