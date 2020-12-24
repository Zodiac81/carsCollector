<template>
    <div>
        <validation-errors-component
            :errors="backValidationErrors"
            v-if="backValidationErrors">
        </validation-errors-component>
        <b-form @submit.prevent="submit">
            <div class="mb-3 mb-sm-3 d-flex justify-content-between d-inline-block flex-column flex-lg-row flex-md-row flex-sm-column">
                <div class="col-md-6 col-sm-12 mb-sm-2 mb-2">
                    <label for="series-name" id="label-name" class="font-weight-bold">Series name</label>
                    <b-form-input
                        id="series-name"
                        v-model.trim="$v.form.name.$model"
                        type="text"
                        placeholder="Enter series name"
                        :class="{'is-invalid': $v.form.name.$error}"
                        aria-describedby="series-name-help series-name-feedback"
                    ></b-form-input>
                    <div>
                        <div class="text-danger" v-if="!$v.form.name.required">Series name is required</div>
                        <div class="text-danger" v-if="!$v.form.name.minLength">Series name must have at least
                            {{ $v.form.name.$params.minLength.min }} characters.
                        </div>
                        <div class="text-danger" v-if="!$v.form.name.maxLength">Series name must have no more
                            {{ $v.form.name.$params.maxLength.max }} characters.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="series-reference" id="label-reference" class="font-weight-bold">Series reference</label>
                    <b-form-input
                        id="series-reference"
                        v-model.trim="$v.form.reference.$model"
                        :class="{'is-invalid': $v.form.reference.$error}"
                        type="text"
                        placeholder="Enter series reference"
                    ></b-form-input>
                    <div>
                        <div class="text-danger" v-if="!$v.form.reference.minLength">Series reference must have at least
                            {{ $v.form.reference.$params.minLength.min }} characters.
                        </div>
                        <div class="text-danger" v-if="!$v.form.reference.maxLength">Series reference must have no more
                            {{ $v.form.reference.$params.maxLength.max }} characters.
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column mb-3 mb-sm-3">
                <div class="col-md-12 col-sm-12">
                    <label for="select-categories" id="categories-group" class="font-weight-bold">Choose category(ies)</label>
                    <multiselect
                        :class="{'is-invalid': $v.form.categories.$error}"
                        id="select-categories"
                        v-model="$v.form.categories.$model"
                        :options="ALL_CATEGORIES"
                        :multiple="true"
                        track-by="id"
                        :close-on-select="true"
                        label="name"
                        name="categories"
                        placeholder="Choose..."
                    >
                    </multiselect>
                    <div class="text-danger" v-if="!$v.form.categories.required">Choose at least one category</div>
                </div>
            </div>
            <div class="mb-3 mb-sm-3 d-flex justify-content-between d-inline-block flex-column flex-lg-row flex-md-row flex-sm-column">
                <div class="col-md-3 col-sm-12">
                    <label for="radio-group-pr-lines" class="font-weight-bold">Production line</label>
                        <b-form-radio-group id="radio-group-pr-lines" v-model="$v.form.line.$model" name="radio-pr-lines">
                            <b-form-radio :value="lines[0]">{{ this.ucFirstChar(lines[0]) }}</b-form-radio>
                            <b-form-radio :value="lines[1]">{{ this.ucFirstChar(lines[1]) }}</b-form-radio>
                            <div class="text-danger" v-if="!$v.form.line.required">Production line is required</div>
                        </b-form-radio-group>
                </div>
                <div class="col-md-9 col-sm-12 p-0">
                    <div class="d-flex  justify-content-between d-inline-block flex-column flex-lg-row flex-md-row flex-sm-column">
                        <div class="col-md-6 col-sm-12 mb-sm-2 mb-2">
                            <label for="release-year"  id="select-group-release" class="font-weight-bold">Released</label>
                                <multiselect
                                    id="release-year"
                                    class="mb-2 mr-sm-2 mb-sm-0"
                                    v-model="$v.form.released.$model"
                                    :options="years"
                                    :value="null"
                                    :class="{'is-invalid': $v.form.released.$error}"
                                    placeholder="Choose"
                                ></multiselect>
                            <div class="text-danger" v-if="!$v.form.released.required">Release year is required</div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="canceled-year" id="select-group-canceled" class="font-weight-bold">Canceled</label>
                            <multiselect
                                id="canceled-year"
                                class="mb-2 mr-sm-2 mb-sm-0"
                                v-model="form.finished"
                                :options="years"
                                :value="null"
                                placeholder="Choose"
                            ></multiselect>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-row col-md-12 col-sm-12">
                <label for="series-description-checkbox" class="font-weight-bold">Has description?</label>
                    <b-form-checkbox switch v-model="hasDescription" size="lg"
                                     id="series-description-checkbox"></b-form-checkbox>
                <br>

                <b-form-group
                    v-if="hasDescription"
                    id="series-description"
                    label="Series description"
                    label-for="cke-editor-description"
                    class="font-weight-bold"
                >
                    <ckeditor id="cke-editor-description" :editor="cke.editor"
                              v-model="$v.form.description.$model"></ckeditor>
                    <div class="text-danger" v-if="!$v.form.description.maxLength">Series description must have no more
                        {{ $v.form.description.$params.maxLength.max }} characters.
                    </div>
                </b-form-group>
            </div>
            <div class="text-right col-md-12">
                <b-btn @click="close(id)">Cancel</b-btn>
                <b-btn type="submit" variant="outline-primary" :disabled="STATUS === 'PENDING'">
                    {{ isEdit ? 'Update' : 'Create' }}
                </b-btn>
                <p class="typo__p text-danger" v-if="STATUS === 'ERROR'">Please fill the form correctly.</p>
                <p class="typo__p" v-if="STATUS === 'PENDING'">Sending...</p>
            </div>
        </b-form>
    </div>
</template>

<script>

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import {required, minLength, maxLength, alphaNum, numeric} from 'vuelidate/lib/validators'
import Multiselect from 'vue-multiselect'
import {mapGetters, mapActions, mapMutations} from "vuex";

export default {
    name: "CreateSeriesFormComponent",
    props: ['id', 'data', 'edit'],
    components: {Multiselect},
    computed: {
        ...mapGetters(['ALL_CATEGORIES', 'STATUS']),
        years() {
            const year = new Date().getFullYear()
            return Array.from({length: year - 2000}, (value, index) => 2005 + index)
        }
    },
    async mounted() {
        await this.FETCH_CATEGORIES()
    },
    data() {
        return {
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
            isEdit: this.edit,
            hasDescription: false
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
                minLength: minLength(3),
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
        ...mapActions(['FETCH_CATEGORIES', 'UPDATE_SERIES', 'CREATE_SERIES']),
        ...mapMutations(['CHANGE_STATUS']),
       async submit() {
            this.$v.$touch()
            if (this.$v.$invalid) {
                this.CHANGE_STATUS('ERROR')
                return
            } else if (!this.$v.$invalid && this.isEdit) {
                this.CHANGE_STATUS('PENDING')
                this.getCategoriesId()
                await this.UPDATE_SERIES({id: this.data.id, form: this.form})
            } else {
                this.CHANGE_STATUS('PENDING')
                this.getCategoriesId()
                await this.CREATE_SERIES(this.form)
            }
             this.$bvModal.hide(this.id)
        },
        ucFirstChar(str) {
            return str[0].toUpperCase() + str.slice(1)
        },
        getCategoriesId() {
            this.form.categories = this.form.categories.map(category => category.id) //set only id from multiselect
        },
        close(id) {
            this.$bvModal.hide(id)
            this.CHANGE_STATUS(null)
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
