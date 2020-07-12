import Vue from 'vue'
import validation from './functions/validation'
import misc from './functions/misc'

const instanceProps = {
  validation,
  misc
}

Vue.prototype.$tpd = instanceProps