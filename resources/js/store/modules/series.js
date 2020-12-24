import alert from './alert'

export default {
    actions: {
        async FETCH_SERIES(context) {
            await axios.get('api/v1/series').then((response) => {
                const series = response.data.data
                const totalRows = series.length
                context.commit('UPDATE_SERIES_STATE', {
                    series: series,
                    totalRows: totalRows
                })
            }).catch(error => {
                console.error(error)
            })
        },
        async CREATE_SERIES(context, data){
            axios.post('api/v1/series', data)
                .then(response => {
                    if (response.status === 201) {
                        context.commit('UPDATE_SERIES_LIST_AFTER_CREATE', response.data.data)
                        context.commit('CHANGE_STATUS', null)
                        context.dispatch('ALERT_DATA', {
                            status: response.statusText,
                            msg: response.data.msg
                        })
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.backValidationErrors = error.response.data.errors
                    }
                    console.error(error)
                })
        },

        async DELETE_SERIES(context, id) {
            await axios.delete('api/v1/series/' + id)
                .then(response => {
                    context.commit('UPDATE_SERIES_LIST_AFTER_DELETE', response.data.data)
                    context.dispatch('ALERT_DATA', {
                        status: response.statusText,
                        msg: response.data.msg
                    })
                }).catch(error => {
                    console.error('Error : ', error)
                })
        },
        async UPDATE_SERIES(context, data) {
            data.form.parent_id = data.form.parentCategory
            delete data.form.parentCategory

            await axios.put(`api/v1/series/${data.id}`, data.form)
                .then(response => {
                    if (response.status === 200) {
                        context.commit('UPDATE_SERIES_LIST_AFTER_UPDATE', response.data.data)
                        context.commit('CHANGE_STATUS', null)
                        context.dispatch('ALERT_DATA', {
                            status: response.statusText,
                            msg: response.data.msg
                        })
                    }
                })
                .catch(error => {
                    if (error.response.status >= 400) {
                        this.backValidationErrors = error.response.data.errors
                    }
                    console.error(error)
                })
        },
        TOTAL_ROWS_AFTER_FILTER(ctx, data) {
            ctx.commit('UPDATE_TOTAL_ROWS_AFTER_FILTER', data)
        }
    },
    mutations: {
        UPDATE_SERIES_STATE(state, data) {
            state.series = data.series
            state.totalRows = data.totalRows
            state.total = data.series.length
        },
        UPDATE_SERIES_LIST_AFTER_UPDATE(state, item) {
            state.series = state.series.map(function (i) {
                if (i.id === item.id) {
                    return item
                }
                return i
            })
        },
        UPDATE_SERIES_LIST_AFTER_CREATE(state, item) {
            state.series.push(item)
        },
        UPDATE_SERIES_LIST_AFTER_DELETE(state, res) {
            state.series = state.series.filter(function (item) {
                return item.id !== res
            })
            state.totalRows = state.series.length
        },
        UPDATE_TOTAL_ROWS_AFTER_FILTER(state, data) {
            state.totalRows = data.length
            state.total = data.length
        }
    },
    state: {
        series: [],
        totalRows: 1,
        form: {},
        showModal: false,
        total: null
    },
    getters: {
        ALL_SERIES(state) {
            return state.series
        },
        TOTAL_ROWS(state) {
            return state.totalRows
        },
        TOTAL_SERIES_COUNT(state) {
            return state.total
        }
    },
}
