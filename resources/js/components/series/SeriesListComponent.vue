<template>
    <div class="col-md-12">
        <!--Alert-->
        <alert-component
            :dismissCountDown="alert.dismissCountDown"
            :variant=alert.variant
            :message="alert.message"
            @dismisse="alert.dismissCountDown=0">
        </alert-component>
        <!--Table-->
        <div class="card">
            <div class="card-header d-flex justify-content-md-between">
                <h4 class="card-title">Series List</h4>
                <div class="d-flex justify-content-end">
                    <b-button @click="$bvModal.show(infoCreateModal.id)" variant="success">
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
                            <series-details-component :series-data="row.item"></series-details-component>
                        </template>

                        <template #cell(actions)="row">
                            <b-button @click="$bvModal.show(infoUpdateModal.id + row.item.id)" variant="info"
                                      class="btn-sm">
                                <i class="nc-icon nc-settings"></i>
                            </b-button>
                            <b-modal
                                :id="infoUpdateModal.id + row.item.id"
                                :title="infoUpdateModal.title"
                                hide-footer
                                size="lg">

                                <series-form-component :id="infoUpdateModal.id + row.item.id" :data=row.item :edit=true
                                                       @action="updateItem" @alert="showAlert"></series-form-component>
                            </b-modal>
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
                <b>Total : {{ series.length }}</b>
            </div>
        </div>
        <!-- Modals -->
        <b-modal
            :id="infoCreateModal.id"
            :title="infoCreateModal.title"
            hide-footer
            size="lg">
            <series-form-component :id="infoCreateModal.id" :edit=false :data={} @action="setItem"
                                   @alert="showAlert"></series-form-component>
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
                    key: 'released',
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
            infoUpdateModal: {
                id: 'update-modal',
                title: 'Update series',
                btnTitle: 'Update',
            },
            infoDeleteModal: {
                id: 'delete-modal-',
                title: 'Delete ',
            },
            alert: {
                variant: '',
                message: '',
                dismissSecs: 5,
                dismissCountDown: 0,
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
        setItem(item) {
            this.series.push(item)
        },
        updateItem(item) {
            this.series = this.series.map(function (i) {
                if (i.id === item.id) {
                    return item
                }
                return i
            })
        },
        deleteItem(id) {
            axios.delete('api/series/' + id)
                .then(response => {
                    this.series = this.series.filter(function (item) {
                        return item.id !== response.data.data
                    })
                    this.totalRows = this.series.length
                    this.showAlert(response.statusText, response.data.msg)
                }).catch(error => {
                console.log('Error : ', error)
            })
        },
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        showAlert(status, msg) {
            console.log(status, msg)
            const successStatusesArr = [
                'Created', 'OK',
            ]

            this.alert.dismissCountDown = this.alert.dismissSecs
            if(successStatusesArr.includes(status)) {
                this.alert.variant = 'success'
                this.alert.message = msg
            } else {
                this.alert.variant = 'danger'
                this.alert.message = 'Error!'
            }
        },

    }
}
</script>
