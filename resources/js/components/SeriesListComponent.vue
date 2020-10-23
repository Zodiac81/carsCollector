<template>
    <div class="col-md-12">
<!--Alert-->
        <alert-component
            :status="alert.status"
            :show="alert.show"
            :text="alert.text"
            @cancelData="cancelAlertData">
        </alert-component>
<!--Table-->
        <div class="card">
            <div class="card-header d-flex justify-content-md-between">
                <h4 class="card-title">Series List</h4>
                <div class="d-flex justify-content-end">
                    <b-button @click="$bvModal.show(infoCreateModal.id)" variant="success" class="">
                        <i class="nc-icon nc-simple-add"></i>
                    </b-button>
                </div>
            </div>
            <div class="card-body">
                <b-container fluid>
                    <b-row>
                        <div class="d-flex justify-content-between w-100">
                            <b-col sm="2" md="3" class="my-1">
                                <b-form-group
                                    label="Per page"
                                    label-cols-sm="6"
                                    label-cols-md="4"
                                    label-cols-lg="3"
                                    label-align-sm="left"
                                    label-size="sm"
                                    label-for="perPageSelect"
                                >
                                    <b-form-select
                                        v-model="perPage"
                                        id="perPageSelect"
                                        size="sm"
                                        class="w-25"
                                        :options="pageOptions"
                                    ></b-form-select>
                                </b-form-group>
                            </b-col>

                            <b-col lg="4" class="my-1">
                                <b-form-group>
                                    <b-input-group size="sm">
                                        <b-form-input
                                            v-model="filter"
                                            type="search"
                                            id="filterInput"
                                            placeholder="Search"
                                        ></b-form-input>
                                        <b-input-group-append>
                                            <b-button :disabled="!filter" @click="filter = ''" class="m-0">
                                                Clear
                                            </b-button>
                                        </b-input-group-append>
                                    </b-input-group>
                                </b-form-group>
                            </b-col>
                        </div>
                    </b-row>
                </b-container>
                <div class="table">
                    <b-table
                        id="series-table"
                        :items="series"
                        :per-page="perPage"
                        :current-page="currentPage"
                        :fields="fields"
                        :hover="true"
                        :sort-by.sync="sortBy"
                        :sort-desc.sync="sortDesc"
                        :filter="filter"
                        :filter-included-fields="filterOn"
                        @filtered="onFiltered"
                        responsive="sm"
                        sort-icon-left
                    >
                        <template #cell(show_details)="row">
                            <b-button size="sm" @click="row.toggleDetails" class="mr-2">
                                {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
                            </b-button>
                        </template>
                        <template #row-details="row">
                            <b-card>
                                <b-row class="mb-2">
                                    <b-col sm="3" class="text-sm-right"><b>Description:</b></b-col>
                                    <b-col>{{ row.item.description }}</b-col>
                                </b-row>
                                <b-button size="sm" @click="row.toggleDetails">Hide Details</b-button>
                            </b-card>
                        </template>

                        <template #cell(actions)="row">
                            <b-button variant="info" class="btn-sm">
                                <i class="nc-icon nc-settings"></i>
                            </b-button>
                            <b-button @click="$bvModal.show(infoDeleteModal.id + row.item.id)" variant="danger"
                                      class="btn-sm">
                                <b-icon icon="trash-fill" aria-hidden="true"></b-icon>
                            </b-button>
                            <b-modal
                                :id="infoDeleteModal.id + row.item.id"
                                header-class="border-bottom-0"
                                footer-class="border-top-0"
                                size="md"
                                @ok="deleteItem(row.item.id)"
                            >
                                <template>
                                    <h6 class="text-center">{{
                                            infoDeleteModal.title + '"' + row.item.name + '"' + ' ?'
                                        }}</h6>
                                </template>

                            </b-modal>
                        </template>
                    </b-table>
<!--Pagination-->
                    <b-pagination
                        v-model="currentPage"
                        :total-rows="totalRows"
                        :per-page="perPage"
                        aria-controls="series-table"
                        align="right"
                    ></b-pagination>
                </div>
            </div>
        </div>
<!-- Modals -->
        <b-modal
            :id="infoCreateModal.id"
            :title="infoCreateModal.title"
            :ok-title="infoCreateModal.btnTitle"
            size="lg">
            <create-series-form-component></create-series-form-component>
        </b-modal>
    </div>
</template>

<script>
export default {
    data() {
        return {
            series: [],
            perPage: 10,
            currentPage: 1,
            totalRows: 1,
            fields: [
                {
                    key: 'name',
                    label: 'name',
                    sortable: true,
                    filterByFormatted: true
                },
                {
                    key: 'line',
                    label: 'line',
                    sortable: true
                },
                {
                    key: 'release',
                    label: 'released',
                    sortable: true,
                },
                {
                    key: 'finished',
                    label: 'finished',
                    sortable: true,
                },
                {key: 'show_details', label: 'show details', sortable: false},
                {key: 'actions', label: 'actions', sortable: false}
            ],
            pageOptions: [5, 10, 15, 20],
            sortBy: 'line',
            sortDesc: true,
            filter: null,
            filterOn: [],
            infoCreateModal: {
                id: 'create-modal',
                title: 'Add new series',
                btnTitle: 'Create',
            },
            infoDeleteModal: {
                id: 'delete-modal-',
                title: 'Delete ',
            },
            alert: {
                status: '',
                show: false,
                text: ''
            }

        }

    },
    computed: {

        // rows() {
        //     return this.series.length
        // }
    },
    mounted() {
        axios.get('api/series').then((response) => {
            this.series = response.data.data
            this.totalRows = this.series.length
        }).catch(error => {
            console.log(error)
        })
    },
    methods: {

        addPhoto(e) {
            console.log("dispatch the request");
        },

        deleteItem(id) {
            axios.delete('api/series/' + id).then(response => {
               this.alertData('success')
            }).catch(error => {
                this.alertData('danger')
                console.log('Error : ', error)
            })
        },
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        cancelAlertData(arr) {
            this.alert.show = arr[0]
            this.alert.status = arr[1]
            this.alert.text = arr[2]
        },
        alertData(data) {
            this.alert.status = data
            this.alert.show = true
            data === 'success' ? this.alert.text = 'Success!' : this.alert.text = 'Error!'
        }
    }
}
</script>
