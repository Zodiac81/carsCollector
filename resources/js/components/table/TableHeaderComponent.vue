<template>
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
</template>

<script>
export default {
    name: "TableHeaderComponent",
    props: [],
    data() {
        return {}
    }
}
</script>

<style scoped>

</style>
