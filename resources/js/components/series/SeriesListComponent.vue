<template>
    <div class="col-md-12">
        <!--Alert-->
        <alert-component
            :dismissCountDown="ALERT.dismissCountDown"
            :variant=ALERT.variant
            :message="ALERT.message"
            @dismisse="ALERT.dismissCountDown=0">
        </alert-component>
        <!--Table-->
        <div class="card w-100">
            <div class="card-header d-flex justify-content-md-between">
                <h4 class="card-title">Series</h4>
                <div class="d-flex justify-content-end">
                    <b-button @click="$bvModal.show(modal.create.id)" variant="success">
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
                                        class="w-50"
                                        :options="PAGE_OPTIONS"
                                    ></b-form-select>
                                </b-form-group>
                            </b-col>

                            <b-col lg="4" class="my-1 p-0">
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
                        :items="ALL_SERIES"
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
                        fixed
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
                            <!--UPDATE-->
                            <b-button @click="$bvModal.show(modal.update.id + row.item.id)" variant="info"
                                      class="btn-sm">
                                <i class="nc-icon nc-settings"></i>
                            </b-button>
                            <b-modal
                                :id="modal.update.id + row.item.id"
                                :title="modal.update.title"
                                hide-footer
                                size="lg">
                                <series-form-component
                                    :id="modal.update.id + row.item.id"
                                    :data=row.item
                                    :edit=true>
                                </series-form-component>
                            </b-modal>
                            <!--DELETE-->
                            <b-button @click="$bvModal.show(modal.delete.id + row.item.id)" variant="danger"
                                      class="btn-sm">
                                <b-icon icon="trash-fill" aria-hidden="true"></b-icon>
                            </b-button>
                            <b-modal
                                :id="modal.delete.id + row.item.id"
                                header-class="border-bottom-0"
                                footer-class="border-top-0"
                                size="md"
                                @ok="DELETE_SERIES(row.item.id)"
                            >
                                <template>
                                    <h6 class="text-center">{{
                                            modal.delete.title + '"' + row.item.name + '"' + ' ?'
                                        }}</h6>
                                </template>
                            </b-modal>
                        </template>
                    </b-table>
                    <div class="d-flex justify-content-between">
                        <b>Total : {{ TOTAL_SERIES_COUNT }}</b>
                        <!--Pagination-->
                        <b-pagination
                            v-model="currentPage"
                            :total-rows="TOTAL_ROWS"
                            :per-page="perPage"
                            aria-controls="series-table"
                            align="right"
                        ></b-pagination>
                    </div>

                </div>

            </div>
        </div>
<!--         Modals-->
                <b-modal
                    :id="modal.create.id"
                    :title="modal.create.title"
                    hide-footer
                    size="lg">
                    <series-form-component
                        :id="modal.create.id"
                        :edit=false
                        :data={}>
                    </series-form-component>
                </b-modal>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    async mounted() {
        await this.FETCH_SERIES()
    },
    data() {
        return {
            perPage: 10,
            currentPage: 1,
            pageOptions: [5, 10, 15, 20],
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
                    sortable: true,

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
                {
                    key: 'show_details',
                    label: 'show details',
                    sortable: false,

                },
                {
                    key: 'actions',
                    label: 'actions',
                    sortable: false,

                }
            ],
            sortBy: 'line',
            sortDesc: true,
            filter: null,
            filterOn: [],
            modal: {
                create: {
                    id: 'create-modal',
                    title: 'Add new series',
                    btnTitle: 'Create',
                },
                update: {
                    id: 'update-modal-',
                    title: 'Update series',
                    btnTitle: 'Update',
                },
                delete: {
                    id: 'delete-modal-',
                    title: 'Delete ',
                }
            }
        }
    },
    computed: {
        ...mapGetters([
            'ALL_SERIES',
            'TOTAL_ROWS',
            'ALERT',
            'TOTAL_SERIES_COUNT',
            'FILTER',
            'FILTER_ON',
            'PAGE_OPTIONS',
            'PER_PAGE',
            'CURRENT_PAGE',
            'SORT_BY',
            'SORT_DESC'
        ])
    },
    methods: {
        ...mapActions(['FETCH_SERIES', 'DELETE_SERIES', 'TOTAL_ROWS_AFTER_FILTER', 'CHANGE_PER_PAGE']),
        onFiltered(filteredItems) {
            this.TOTAL_ROWS_AFTER_FILTER(filteredItems)
        }
    }
}
</script>

