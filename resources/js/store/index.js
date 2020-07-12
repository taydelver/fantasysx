import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import base from './modules/base'
import user from './modules/user'
import functions from './modules/functions'
import selections from './modules/selections'
import contests from './modules/contests'
import util from './modules/util'
import config from './modules/config'

export default new Vuex.Store({
  modules: {
    base,
    user,
    functions,
    selections,
    contests,
    util,
    config
  }
})