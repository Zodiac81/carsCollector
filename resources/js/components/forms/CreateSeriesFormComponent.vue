<template>
    <b-form v-on:submit.prevent="submit">
        <b-form-group
            id="input-group-name"
            label="Name"
            label-for="series-name"
        >
            <b-form-input
                id="series-name"
                v-model="form.name"
                type="text"
                required
                placeholder="Enter series name"
            ></b-form-input>
        </b-form-group>

        <b-form-group
            id="input-group-reference"
            label="Series reference"
            label-for="series-reference"
        >
            <b-form-input
                id="series-reference"
                v-model="form.reference"
                type="text"
                placeholder="Enter series reference"
            ></b-form-input>
        </b-form-group>
        <b-form-group label="Production line">
            <b-form-radio v-model="form.line" name="some-radios" :value="lines[0]">{{ this.ucFirstChar(lines[0]) }}</b-form-radio>
            <b-form-radio v-model="form.line" name="some-radios" :value="lines[1]">{{ this.ucFirstChar(lines[1])}}</b-form-radio>
        </b-form-group>
        <b-form-group
            id="select-group-release"
            label="Release year"
            label-for="release-year">
            <b-form-select
                id="release-year"
                class="mb-2 mr-sm-2 mb-sm-0"
                v-model="form.released"
                :options="years"
                :value="null"
                required
            ></b-form-select>
        </b-form-group>
        <b-form-group
            id="select-group-finished"
            label="Production stop year"
            label-for="finished-year">
            <b-form-select
                id="finished-year"
                class="mb-2 mr-sm-2 mb-sm-0"
                v-model="form.finished"
                :options="years"
                :value="null"
            ></b-form-select>
        </b-form-group>
        <b-form-group
            id="series-description"
            label="Series description"
            label-for="cke-editor-description"
        >
            <ckeditor id="cke-editor-description" :editor="cke.editor" v-model="form.description"></ckeditor>
        </b-form-group>
        <div class="text-right">
            <b-btn @click="$bvModal.hide(id)">Cancel</b-btn>
            <b-btn type="submit" variant="outline-primary">Create</b-btn>
        </div>
    </b-form>


</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    name: "CreateSeriesFormComponent",
    props: ['id'],
    computed: {
        years() {
            const year = new Date().getFullYear()
            return Array.from({length: year - 2000}, (value, index) => 2005 + index)
        }
    },
    data() {
        return {
            lines: ['main', 'expanded'],
            form: {
                name: '',
                reference: '',
                line: '',
                released: '',
                finished: '',
                description: '',
            },
            cke: {
                editor: ClassicEditor,
                editorData: '',
            }
        }
    },
    methods: {
        submit() {
            axios.post('api/series', this.form)
            .then( response => {
                this.$emit('created', response.data.data);
                this.$emit('alert', 'success');
                this.$bvModal.hide(this.id)
            })
            .catch(error => {
                this.$emit('alert', 'danger');
                console.log(error)
            })
        },
        ucFirstChar(str) {
            return str[0].toUpperCase() + str.slice(1)
        }
    }
}
</script>

<style>
.ck-editor__editable {
    min-height: 100px;
}
</style>
