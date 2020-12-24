export default {
    actions: {
        CHANGE_PER_PAGE(context, data) {
            console.log(data)
            context.commit('UPDATE_PER_PAGE', data)
        }
    },
    mutations: {
        UPDATE_PER_PAGE(state, data) {
            state.perPage = data
        }
    },
    state: {
        perPage: 10,
        currentPage: 1,
        pageOptions: [5, 10, 15, 20],
        sortBy: 'line',
        sortDesc: true,
        filter: null,
        filterOn: [],
    },
    getters: {
       PER_PAGE(state) {
           return state.perPage
       },
        CURRENT_PAGE(state) {
           return state.currentPage
        },
        PAGE_OPTIONS(state) {
           return state.pageOptions
        },
        SORT_BY(state) {
           return state.sortBy
        },
        SORT_DESC(state) {
           return state.sortDesc
        },
        FILTER(state) {
           return state.filter
        },
        FILTER_ON(state) {
           return state.filterOn
        }
    }
}
