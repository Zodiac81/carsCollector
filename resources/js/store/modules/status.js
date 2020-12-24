export default {
    mutations: {
       CHANGE_STATUS(state,status) {
           state.submitStatus = status
       }
    },
    state: {
        submitStatus: null,
    },
    getters: {
        STATUS(state) {
            return state.submitStatus
        }
    }
}
