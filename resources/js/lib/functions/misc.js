import store from '../../store'

export default {
  remainingSalary: () => {
    const allSelected = store.getters['selections/allSelectedRiders']
    const salaryCap = store.getters['config/salaryCap']
    const r250 = allSelected.riders250.filter(r => {
      return _.isObject(r) && r !== null
    }).map(r => r.value)
    const r450 = allSelected.riders450.filter(r => {
      return _.isObject(r) && r !== null
    }).map(r => r.value)
    const totals = _.sum(_.concat(r250, r450))
    return _.subtract(salaryCap, totals)
  },
  selectedRiderIds: () => {
    const allSelected = store.getters['selections/allSelectedRiders']
    const r250 = allSelected.riders250.filter(r => {
      return _.isObject(r) && r !== null
    }).map(r => r.id)
    const r450 = allSelected.riders450.filter(r => {
      return _.isObject(r) && r !== null
    }).map(r => r.id)
    return _.concat(r250, r450)
  }
}