import Vue from 'vue'
import Vuex from 'vuex'
import series from './modules/series'
import category from './modules/category'
import status from './modules/status'
import alert from './modules/alert'
import table from './modules/table'
Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        series,
        category,
        alert,
        status,
        table
    }
})
