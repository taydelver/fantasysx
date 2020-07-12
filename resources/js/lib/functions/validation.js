import store from '../../store'

export default {
  ridersFilled: async (raceClass) => {
    const key = `selections/riders${raceClass}Filled`
    const check = store.getters[key]

    if(!check) {
      throw 'Minimum of 4 riders per class is required.'
    } else {
      return check
    }
  },
  minRiders: () => {
    const riders250 = store.getters['selections/riders250Filled']
    const riders450 = store.getters['selections/riders450Filled']
    if(!riders250 || !riders450) {
      return false
    } else {
      return true
    }
  },
  contest: (obj) => {
    const keys = Object.keys(obj)
    const invalid = keys.filter(i => {
      return !obj[i]
    })
    if(invalid.length) {
      return {status: 'error', items: invalid}
    } else {
      return {status: 'success'}
    }
  }


}