<template>
    <b-card>
        <b-row class="mb-2">
            <b-col sm="3" class="text-sm-left">
                <b>Reference :</b> {{ seriesData.reference }}
            </b-col>
            <b-col sm="3" class="text-sm-left">
                <b>Description :</b> <span v-html="seriesData.description"></span>
            </b-col>

            <b-col sm="3" class="text-sm-left">
                <b>Parent ID :</b> {{ seriesData.parent_id ? seriesData.parent_id : '-' }}
            </b-col>
        </b-row>
        <b-row class="mb-2">
            <b-col sm="3" class="text-sm-left">
                <b>Categories :</b>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                <b-list-group horizontal>
                    <b-list-group-item v-for="category in seriesData.categories" :key="category.id">
                        {{ category.name }}
                    </b-list-group-item>
                </b-list-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
export default {
    name: "SeriesDetailsComponent",
    props: ['seriesData']
}
</script>
