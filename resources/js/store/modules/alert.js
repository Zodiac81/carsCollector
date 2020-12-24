export default {
    actions: {
        ALERT_DATA(context, data) {
            const successStatusesArr = ['Created', 'OK']
            let params = {
                status: data.status,
                msg: data.msg
            }

            if (successStatusesArr.includes(data.status)) {
                params.variant = 'success'
            } else {
                params.variant = 'danger'
                params.msg = 'Error!'
            }
            context.commit('UPDATE_ALERT_DATA', params)
        }
    },
    mutations: {
        UPDATE_ALERT_DATA(state, data) {
            state.dismissCountDown = state.dismissSecs
            state.message = data.msg
            state.variant = data.variant
        }
    },
    state: {
        variant: '',
        message: '',
        dismissSecs: 5,
        dismissCountDown: 0,
    },
    getters: {
        ALERT(state) {
            return state
        }
    },
}
