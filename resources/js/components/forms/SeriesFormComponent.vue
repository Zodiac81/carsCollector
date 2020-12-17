<template>
    <div>
        <validation-errors-component :errors="backValidationErrors" v-if="backValidationErrors"></validation-errors-component>
        <b-form @submit.prevent="submit">
            <div class="w-100">
                <b-form-group
                    id="input-group-name"
                    label="Name"
                    label-for="series-name"
                >
                    <b-form-input
                        id="series-name"
                        v-model.trim="$v.form.name.$model"
                        type="text"
                        placeholder="Enter series name"
                        :class="{'is-invalid': $v.form.name.$error}"
                        aria-describedby="series-name-help series-name-feedback"

                    ></b-form-input>
                    <div class="text-danger" v-if="!$v.form.name.required">Series name is required</div>
                    <div class="text-danger" v-if="!$v.form.name.minLength">Series name must have at least {{$v.form.name.$params.minLength.min}} characters.</div>
                    <div class="text-danger" v-if="!$v.form.name.maxLength">Series name must have no more {{$v.form.name.$params.maxLength.max}} characters.</div>
                </b-form-group>
                <b-form-group
                    id="input-group-reference"
                    label="Series reference"
                    label-for="series-reference"
                >
                    <b-form-input
                        id="series-reference"
                        v-model.trim="$v.form.reference.$model"
                        :class="{'is-invalid': $v.form.reference.$error}"
                        type="text"
                        placeholder="Enter series reference"
                    ></b-form-input>
                    <div class="text-danger" v-if="!$v.form.reference.minLength">Series reference must have at least {{$v.form.reference.$params.minLength.min}} characters.</div>
                    <div class="text-danger" v-if="!$v.form.reference.maxLength">Series reference must have no more {{$v.form.reference.$params.maxLength.max}} characters.</div>
                </b-form-group>

                <b-form-group
                    id="categories-group"
                    label="Choose category(ies)"
                    label-for="select-categories"
                >
                    <multiselect
                        :class="{'is-invalid': $v.form.categories.$error}"
                        id="select-categories"
                        v-model="$v.form.categories.$model"
                        :options="options"
                        :multiple="true"
                        track-by="name"
                        label="name"
                        name="categories"
                        placeholder="Choose"
                    >
                    </multiselect>
                    <div class="text-danger" v-if="!$v.form.categories.required">Choose at least one category</div>
                </b-form-group>
            </div>

            <b-form-group label="Production line">
                <b-form-radio-group id="radio-group-pr-lines" v-model="$v.form.line.$model" name="radio-pr-lines">
                <b-form-radio :value="lines[0]">{{ this.ucFirstChar(lines[0]) }}</b-form-radio>
                <b-form-radio :value="lines[1]">{{ this.ucFirstChar(lines[1])}}</b-form-radio>
                    <div class="text-danger" v-if="!$v.form.line.required">Production line is required</div>
                </b-form-radio-group>
            </b-form-group>

            <div class="w-50 d-flex justify-content-between">
                <b-form-group
                    id="select-group-release"
                    label="Release year"
                    label-for="release-year">
                    <b-form-select
                        id="release-year"
                        class="mb-2 mr-sm-2 mb-sm-0"
                        v-model="$v.form.released.$model"
                        :options="years"
                        :value="null"
                        :class="{'is-invalid': $v.form.released.$error}"
                    ></b-form-select>
                    <div class="text-danger" v-if="!$v.form.released.required">Release year is required</div>
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
            </div>
            <b-form-group
                id="series-description"
                label="Series description"
                label-for="cke-editor-description"
            >
                <ckeditor id="cke-editor-description" :editor="cke.editor" v-model="$v.form.description.$model"></ckeditor>
                <div class="text-danger" v-if="!$v.form.description.maxLength">Series description must have no more {{$v.form.description.$params.maxLength.max}} characters.</div>
            </b-form-group>
            <div class="text-right">
                <b-btn @click="$bvModal.hide(id)">Cancel</b-btn>
                <b-btn type="submit" variant="outline-primary" :disabled="submitStatus === 'PENDING'">{{ isEdit ? 'Update' : 'Create' }}</b-btn>
                <p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
                <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
            </div>
        </b-form>
    </div>
</template>

<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { required, minLength, maxLength, alphaNum, numeric } from 'vuelidate/lib/validators'
import Multiselect from 'vue-multiselect'

export default {
    name: "CreateSeriesFormComponent",
    props: ['id', 'data', 'edit'],
    components: { Multiselect },
    computed: {
        years() {
            const year = new Date().getFullYear()
            return Array.from({length: year - 2000}, (value, index) => 2005 + index)
        }
    },
    mounted() {
        axios.get('api/v1/categories').then((response) => {
            this.options = response.data.data
        }).catch(error =>{
            console.log(error)
        })
    },
    data() {
        return {
            loading: false,
            options:[],
            lines: ['main', 'expanded'],
            form: {
                name: this.data.name || '',
                reference: this.data.reference || '',
                line: this.data.line || '',
                released: this.data.released || '',
                finished: this.data.finished || '',
                description: this.data.description || '',
                parentCategory: this.data.parent_id || '',
                categories: this.data.categories || '',
            },
            cke: {
                editor: ClassicEditor,
                editorData: '',
            },
            backValidationErrors: '',
            submitStatus: null,
            isEdit: this.edit
        }
    },
    validations: {
        form: {
            name: {
                required,
                minLength: minLength(4),
                maxLength: maxLength(255),
            },
            reference: {
                minLength: minLength(4),
                maxLength: maxLength(255),
            },
            categories: {
                required
            },
            line: {
                required
            },
            released: {
                required,
                numeric
            },
            description: {
                maxLength: maxLength(1000),
            }
        }
    },
    methods: {
        submit() {
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.submitStatus = 'ERROR'
            } else if(!this.$v.$invalid && this.isEdit){
               this.update(this.data.id)
            } else {
                this.create()
            }
        },
        ucFirstChar(str) {
            return str[0].toUpperCase() + str.slice(1)
        },

        create() {
            this.form.categories = this.form.categories.map(category => category.id)
            axios.post('api/v1/series', this.form)
                .then( response => {
                    if(response.status === 201) {
                        this.submitStatus = 'PENDING'
                        this.$emit('action', response.data.data);
                        this.$emit('alert', response.statusText, response.data.msg)
                        this.$bvModal.hide(this.id)
                    }
                })
                .catch(error => {
                    if (error.response.status === 422){
                        this.backValidationErrors = error.response.data.errors
                    }
                    console.log(error)
                })
        },
        update(id) {
            this.form.categories = this.form.categories.map(category => category.id)
            axios.put('api/v1/series/' + id, this.form)
                .then( response => {
                    if(response.status === 200) {
                        this.submitStatus = 'PENDING'
                        this.$emit('action', response.data.data);
                        this.$emit('alert', response.statusText, response.data.msg)
                        this.$bvModal.hide(this.id)
                    }

                })
                .catch(error => {
                    if (error.response.status >= 400){
                        this.backValidationErrors = error.response.data.errors
                    }
                    console.log(error)
                })
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
.is-invalid .multiselect__tags {
    border-color: #e3342f;
}
</style>
