export default {
    actions: {
        async FETCH_CATEGORIES(context) {
            await axios.get('api/v1/categories')
                .then((response) => {
                    //console.log(response.data.data)
                    context.commit('updateCategoriesState', response.data.data)
                }).catch(error => {
                    console.error(error)
                })
        },
    },
    mutations: {
        updateCategoriesState(state, data) {
            state.categories = data
        }
    },
    state: {
        categories: [],
    },
    getters: {
        ALL_CATEGORIES(state) {
            return state.categories
        }
    },
}
