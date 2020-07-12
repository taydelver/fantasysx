require('./bootstrap');
window.Vue = require('vue');

// Imports
import VueRouter from 'vue-router'
import routes from './routes'
import store from './store'

// Customs
require('./lib/init');

// Vue.use
Vue.use(VueRouter)

// Router
const router = new VueRouter({
    mode: 'history',
    routes
})

// APP LAYOUT
Vue.component('app', require('./App.vue').default);

// Components
Vue.component('page', require('./components/Page.vue').default);
Vue.component('loader', require('./components/Loader.vue').default);
Vue.component('panel', require('./components/Panel.vue').default);
Vue.component('tab-panel', require('./components/TabPanel.vue').default);
Vue.component('custom-button', require('./components/CustomButton.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
