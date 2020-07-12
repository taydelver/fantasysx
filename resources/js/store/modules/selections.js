export default {
  namespaced: true,
  state: {
    rider250: {
      a: null,
      b: null,
      c: null,
      d: null
    },
    rider450: {
      a: null,
      b: null,
      c: null,
      d: null
    },
    selectedIds: [],
    activeSlot: {
      raceClass: null,
      position: null
    },
    activeRiderPanel: null,
    riders: [],
    riders250: [],
    riders450: [],
    userEntered: false
  },
  getters: {
    userEntered: (state) => state.userEntered,
    rider250: (state) => state.rider250,
    rider450: (state) => state.rider450,
    rider250a: (state) => state.rider250.a,
    rider250b: (state) => state.rider250.b,
    rider250c: (state) => state.rider250.c,
    rider250d: (state) => state.rider250.d,
    rider450a: (state) => state.rider450.a,
    rider450b: (state) => state.rider450.b,
    rider450c: (state) => state.rider450.c,
    rider450d: (state) => state.rider450.d,
    selectedIds: (state) => state.selectedIds,
    activeSlot: (state) => state.activeSlot,
    activeRiderPanel: (state) => state.activeRiderPanel,
    riders: (state) => state.riders,
    riders250: (state) => {
      const selected = state.selectedIds
      const riders = state.riders250
      return riders.filter(r => !selected.includes(r.id))
    },
    riders450: (state) => {
      const selected = state.selectedIds
      const riders = state.riders450
      return riders.filter(r => !selected.includes(r.id))
    },
    riders250Filled: (state) => {
      const obj = state.rider250
      const filled = _.omitBy(obj, _.isNull);
      return Object.keys(filled).length == 4
    },
    riders450Filled: (state) => {
      const obj = state.rider450
      const filled = _.omitBy(obj, _.isNull);
      return Object.keys(filled).length == 4
    },
    allSelectedRiders: (state) => {
      const r250 = state.rider250
      const r450 = state.rider450
      return {
        riders250: [r250.a, r250.b, r250.c, r250.d],
        riders450: [r450.a, r450.b, r450.c, r450.d]
      }
    },
  },
  actions: {
    getRiders: async ({commit}, raceClass) => {
      const res = await axios.get(`/api/v1/riders/${raceClass}?sortBy=value&sortOrder=desc`)
      commit('setRiders', {raceClass: raceClass, data: res.data})
      return res.data
    },
    enterContest: ({state}, data) => {
      return axios.post(`/api/v1/selections/${data.id}/enter`, {
        rider_ids: data.riders
      })
    },
    clearData: ({commit}) => {
      return new Promise(resolve => {
        commit('clearAllRiderData')
        setTimeout(() => {resolve()}, 200)
      })
    },
    checkUserContestSelections: ({commit}, id) => {
      return new Promise((resolve, reject) => {
        axios.get(`/api/v1/user/check-contest`, {
          params: {
            contest_id: id
          }
        }).then(res => {
          if(res.data) {
            commit('setFilledRiders', res.data.data.selections)
            resolve(res.data.data)
          } else {
            resolve(res.data)
          }
        }).catch(err => reject(err))
      })
      
    },
  },
  mutations: {
    setRider: (state, rider) => {
      const pos = state.activeSlot.position
      const raceClass = `rider${state.activeSlot.raceClass}`
      const selected = state.selectedIds.includes(rider.id)
      const selectedIds = state.selectedIds
      if(!selected) {
        const keys = ['a', 'b', 'c', 'd']
        const posIndex = keys.indexOf(pos) < 3 ? keys.indexOf(pos) + 1 : 3
        state[raceClass][pos] = rider
        const available = Object.keys(_.pickBy(state[raceClass], _.isNull))
        const nextAvailable = available.length ? available[0] : 'd' 
        state.selectedIds = _.concat(selectedIds, rider.id)
        state.activeSlot = {raceClass: state.activeSlot.raceClass, position: nextAvailable}
        
      }
    },
    setSelected: (state, id) => {
      const selected = state.selectedIds.includes(id)
      if(!selected) {
        state.selectedIds = _.concat(state.selectedIds, id)
      }
    },
    removeRider: (state, data) => {
      const pos = data.position
      const raceClass = `rider${data.raceClass}`
      const selectedIds = state.selectedIds
      state.selectedIds = selectedIds.filter(i => i !== state[raceClass][pos].id)
      state[raceClass][pos] = null
    },
    clearAllRiderData: (state) => {
      const cleared = {a: null, b: null, c: null,d: null}
      state.rider250 = cleared
      state.rider450 = cleared
      state.activeSlot = { raceClass: null, position: null}
      state.selectedIds = []
    },

    setActiveSlot: (state, data) => state.activeSlot = data,
    setActiveRiderPanel: (state, data) => state.activeRiderPanel = data,
    setRiders: (state, data) => {
      const key = `riders${data.raceClass}`
      state[key] = data.data
    },
    setFilledRiders: (state, data) => {
      const keys = ['a', 'b', 'c', 'd']
      const r250 = data.filter(r => r.race_class == 250).map(r => r.rider)
      const r450 = data.filter(r => r.race_class == 450).map(r => r.rider)
      const ids = _.concat(r250.map(r => r.id), r450.map(r => r.id))
      keys.forEach((k, i) => {
        state.rider250[k] = r250[i]
        state.rider450[k] = r450[i]
      })
      state.selectedIds = ids

    }
  }
}