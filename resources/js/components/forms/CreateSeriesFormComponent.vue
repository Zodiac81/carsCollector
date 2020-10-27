<template>
    <div>
        <validation-errors-component :errors="backValidationErrors" v-if="backValidationErrors"></validation-errors-component>
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
                    :state="frontValidationErrorsStatuses.name.state"
                    placeholder="Enter series name"
                    aria-describedby="series-name-help series-name-feedback"
                ></b-form-input>
                <b-form-invalid-feedback id="series-name-feedback">
                    {{ frontValidationErrorsStatuses.name.text }}
                </b-form-invalid-feedback>
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
                <b-form-radio-group id="radio-group-prlines" v-model="form.line" name="radio-prlines">
                <b-form-radio :value="lines[0]">{{ this.ucFirstChar(lines[0]) }}</b-form-radio>
                <b-form-radio :value="lines[1]">{{ this.ucFirstChar(lines[1])}}</b-form-radio>
                <b-form-text id="prlines-feedback" v-if="frontValidationErrorsStatuses.line.state" >
                    {{ frontValidationErrorsStatuses.line.text }}
                </b-form-text>
                </b-form-radio-group>
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
                    :state="frontValidationErrorsStatuses.released.state"
                ></b-form-select>
                <b-form-invalid-feedback id="series-name-feedback">
                    {{ frontValidationErrorsStatuses.released.text }}
                </b-form-invalid-feedback>
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
    </div>


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
        },
        // nameState() {
        //     return this.form.name.length > 2 ? true : false
        // }
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
            },
            backValidationErrors: '',
            frontValidationErrorsStatuses: {
                name: {
                    state: null,
                    text: 'A series name is required'
                },
                line: {
                    state: false,
                    text: 'A series production line is required'
                },
                released: {
                    state: null,
                    text: 'A series released year is required'
                }
            }
        }
    },
    methods: {
        submit() {
            let formValidation = this.validateForm()
            if(formValidation) {
                axios.post('api/series', this.form)
                    .then( response => {
                        this.$emit('created', response.data.data);
                        this.$emit('alert', 'success');
                        this.$bvModal.hide(this.id)
                    })
                    .catch(error => {
                        //this.$emit('alert', 'danger');
                        if (error.response.status === 422){
                            this.backValidationErrors = error.response.data.errors;
                        }
                        console.log(error)
                    })
            }
        },
        ucFirstChar(str) {
            return str[0].toUpperCase() + str.slice(1)
        },
        validateForm: function() {

            if (this.form.name && this.form.line && this.form.released) {
                this.frontValidationErrorsStatuses.name.state = true;
                this.frontValidationErrorsStatuses.line.state = true;
                this.frontValidationErrorsStatuses.released.state = true;
                return true;
            }

            if (!this.form.name) {
                this.frontValidationErrorsStatuses.name.state = false;
            }
            if (!this.form.line) {
                this.frontValidationErrorsStatuses.line.state = true;
            }
            if (!this.form.released) {
                this.frontValidationErrorsStatuses.released.state = false;
            }
        }
    }
}
</script>

<style>
.ck-editor__editable {
    min-height: 100px;
}
#prlines-feedback {
    color: #e3342f !important;
}
</style>
