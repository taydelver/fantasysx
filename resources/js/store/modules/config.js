export default {
  namespaced: true,
  state: {
    baseUrl: '/',
    salaryCap: 50000,
  },
  getters: {
    username: (state) => state.username,
    salaryCap: (state) => state.salaryCap
  },
}