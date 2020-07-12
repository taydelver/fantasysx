import Dashboard from './pages/Dashboard'
import RaceEvent from './pages/RaceEvent'
import Upcoming from './pages/Upcoming'
import Contest from './pages/Contest'
export default  [
  { path: '/dashboard', name: 'dashboard', component: Dashboard },
  { path: '/upcoming', name: 'upcoming', component: Upcoming },
  { path: '/contest/:id/selections', name: 'selections', component: Contest },
  { path: '/event/:id', component: RaceEvent, name: 'event',
    meta: { header: 'page-header', pageType: 'single_event' },
    // children: [
    //   {
    //     path: '',
    //     component: Contests
    //   },
    // ]
  },
]