import Vue from 'vue'
import routes from '../config/PageRoutes.vue'

import VueRouter from 'vue-router'
import VueBootstrap from 'bootstrap-vue'
import VueInsProgressBar from 'vue-ins-progress-bar'
import VueGoodTable from 'vue-good-table';
import VueSweetalert2 from 'vue-sweetalert2'

// plugins css
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'vue-good-table/dist/vue-good-table.css'

import App from './App.vue'

Vue.config.productionTip = false


Vue.use(VueRouter)
Vue.use(VueBootstrap)
Vue.use(VueSweetalert2)
Vue.use(VueGoodTable)
Vue.use(VueInsProgressBar, {
    position: 'fixed',
    show: true,
    height: '3px'
})

const router = new VueRouter({
    mode: 'history',
    routes
})

new Vue({
    render: h => h(App),
    router
}).$mount('#app')
