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
        <div class="card w-100">
            <div class="card-header d-flex justify-content-md-between">
                <h4 class="card-title">Categories</h4>
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
                                        class="w-50"
                                        :options="pageOptions"
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
                        id="categories-table"
                        :items="categories"
                        :per-page="perPage"
                        :current-page="currentPage"
                        :fields="fields"
                        :hover="true"
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
                            <b-card>{{row.item}}
                                <b-row class="mb-2">
                                    <b-col sm="3" class="text-sm-left">
                                        <b>Description :</b> <span v-html="row.item.description"></span>
                                    </b-col>
                                    <b-col sm="3" class="text-sm-left">
                                        <b>Parent category :</b> {{ row.item.category ? row.item.category.name : " " }}
                                    </b-col>
                                </b-row>
                            </b-card>
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

                                <category-form-component
                                    :id="infoUpdateModal.id + row.item.id"
                                    :data=row.item
                                    :edit=true
                                    @action="updateItem"
                                    @alert="showAlert">
                                </category-form-component>

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
                    <div class="d-flex justify-content-between">
                        <b>Total : {{ categories.length }}</b>
                        <!--Pagination-->
                        <b-pagination
                            v-model="currentPage"
                            :total-rows="totalRows"
                            :per-page="perPage"
                            aria-controls="categories-table"
                            align="right"
                        ></b-pagination>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->
        <b-modal
            :id="infoCreateModal.id"
            :title="infoCreateModal.title"
            hide-footer
            size="lg">
            <category-form-component :id="infoCreateModal.id" :edit=false :data={} @action="setItem"
                                   @alert="showAlert"></category-form-component>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "CategoriesListComponent",
    data() {
        return {
            categories: [],
            perPage: 10,
            currentPage: 1,
            totalRows: 1,
            pageOptions: [5, 10, 15, 20],
            // sortBy: 'name',
            sortDesc: true,
            filter: null,
            filterOn: [],
            fields: [
                {
                    key: 'name',
                    label: 'name',
                    sortable: true,
                    filterByFormatted: true
                },
                {
                    key: 'show_details',
                    label: 'show details',
                    sortable: false
                },
                {
                    key: 'actions',
                    label: 'actions',
                    sortable: false,
                    thStyle: { width:'10em'}
                }
            ],
            infoCreateModal: {
                id: 'create-modal',
                title: 'Add new category',
                btnTitle: 'Create',
            },
            infoUpdateModal: {
                id: 'update-modal',
                title: 'Update category',
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
    mounted() {
        axios.get('api/v1/categories')
            .then(response => {
                this.categories = response.data.data
                this.totalRows = this.categories.length
            })
            .catch(error => {
                console.log(error)
            })
    },
    methods: {
        setItem(item) {
            this.categories.push(item)
        },
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        updateItem(item) {
            this.categories = this.categories.map(function (i) {
                if (i.id === item.id) {
                    console.log(item)
                    return item
                }
                return i
            })
        },
        deleteItem(id) {
            axios.delete('api/v1/categories/' + id)
                .then(response => {
                    this.categories = this.categories.filter(function (item) {
                        return item.id !== response.data.data
                    })
                    this.totalRows = this.categories.length
                    this.showAlert(response.statusText, response.data.msg)
                }).catch(error => {
                console.error('Error : ', error)
            })
        },
        showAlert(status, msg) {
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

<style scoped>

</style>
