<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-md-between">
                <h4 class="card-title">Categories</h4>
                <div class="d-flex justify-content-end">
                    <ul>
                        <li v-for="category in categories" :key="category.id">{{ category.name}}</li>
                    </ul>
                    <!--                  <b-button @click="$bvModal.show(infoCreateModal.id)" variant="success">-->
                    <!--                      <i class="nc-icon nc-simple-add"></i>-->
                    <!--                  </b-button>-->
                </div>
            </div>
        </div>
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
    }
}
</script>

<style scoped>

</style>
