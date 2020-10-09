<template>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Series List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <b-table
                                id="series-table"
                                :items="items"
                                :per-page="perPage"
                                :current-page="currentPage"
                                small
                            ></b-table>

                            <b-pagination
                                v-model="currentPage"
                                :total-rows="rows"
                                :per-page="perPage"
                                aria-controls="series-table"
                                align="right"
                            ></b-pagination>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









</template>

<script>

    export default {
        data() {
            return {
                series: [],
                perPage: 10,
                currentPage: 1,
                items: []
            }

        },
        computed: {
            rows() {
                return this.items.length
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/series').then((response) => {
                console.log(response.data.data)
               this.items = response.data.data
            }).catch(error => {
                console.log(error)
            })
        }
    }
</script>
