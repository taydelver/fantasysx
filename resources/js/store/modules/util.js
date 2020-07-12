export default {
  namespaced: true,
  state: {
    selectionsSummaryHeight: null,
  },
  getters: {
    selectionsSummaryHeight: (state) => state.selectionsSummaryHeight
  },
  mutations: {
    setSelectionsSummaryHeight: (state, data) => state.selectionsSummaryHeight = data
  }
}