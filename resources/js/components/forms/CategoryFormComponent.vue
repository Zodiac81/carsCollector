<template>
    <div>
        {{data}}
        <b-form @submit.prevent="submit">
            <div class="w-100">
                <b-form-group
                    id="input-group-name"
                    label="Name"
                    label-for="categories-name"
                >
                    <b-form-input
                        id="categories-name"
                        v-model.trim="$v.form.name.$model"
                        type="text"
                        placeholder="Enter category name"
                        :class="{'is-invalid': $v.form.name.$error}"
                        aria-describedby="categories-name-help categories-name-feedback"
                    ></b-form-input>
                    <div class="text-danger" v-if="!$v.form.name.required">Category name is required</div>
                    <div class="text-danger" v-if="!$v.form.name.minLength">Category name must have at least {{$v.form.name.$params.minLength.min}} characters.</div>
                    <div class="text-danger" v-if="!$v.form.name.maxLength">Category name must have no more {{$v.form.name.$params.maxLength.max}} characters.</div>
                </b-form-group>
                <b-form-group
                    id="categories-group"
                    label="Choose parent category"
                    label-for="select-categories"
                >
                    <multiselect
                        id="select-categories"
                        v-model="form.category"
                        :options="options"
                        track-by="id"
                        label="name"
                        name="parent-category"
                        placeholder="Choose"
                    >
                    </multiselect>
                </b-form-group>
                <b-form-group
                    id="category-description"
                    label="Category description"
                    label-for="cke-editor-description"
                >
                    <ckeditor id="cke-editor-description" :editor="cke.editor" v-model="$v.form.description.$model"></ckeditor>
                    <div class="text-danger" v-if="!$v.form.description.maxLength">Category description must have no more {{$v.form.description.$params.maxLength.max}} characters.</div>
                </b-form-group>
                <div class="text-right">
                    <b-btn @click="$bvModal.hide(id)">Cancel</b-btn>
                    <b-btn type="submit" variant="outline-primary" :disabled="submitStatus === 'PENDING'">{{ isEdit ? 'Update' : 'Create' }}</b-btn>
                    <p class="typo__p" v-if="submitStatus === 'ERROR'">Please fill the form correctly.</p>
                    <p class="typo__p" v-if="submitStatus === 'PENDING'">Sending...</p>
                </div>
            </div>
        </b-form>
        {{form.category}}
    </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { required, minLength, maxLength } from 'vuelidate/lib/validators'
import Multiselect from 'vue-multiselect'

export default {
    name: "CategoryFormComponent",
    components: { Multiselect },
    props: ['id', 'data', 'edit'],
    data() {
        return {
            form: {
                name: this.data.name || '',  //data from props
                description: this.data.description || '',
                category: this.data.category.name || '',
            },
            cke: {
                editor: ClassicEditor,
                editorData: '',
            },
            backValidationErrors: '',
            submitStatus: null,
            isEdit: this.edit,
            options:[],
        }
    },
    validations: {
        form: {
            name: {
                required,
                minLength: minLength(4),
                maxLength: maxLength(255),
            },
            description: {
                maxLength: maxLength(1000),
            }
        }
    },

    mounted() {
        axios.get('api/v1/categories').then((response) => {
            this.options = response.data.data
        }).catch(error =>{
            console.log(error)
        })
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
        create() {
            axios.post('api/v1/categories', {
                name: this.form.name,
                description: this.form.description,
                parent_id: this.form.category.id
            })
            .then( response => {
                if(response.status === 201) {
                    this.submitStatus = 'PENDING'
                    this.$emit('action', response.data.data);
                    this.$emit('alert', response.statusText, response.data.msg)
                    this.$bvModal.hide(this.id)
                }
            })
            .catch( error => {
                if (error.response.status >= 400){
                    this.backValidationErrors = error.response.data.errors
                }
                console.error(error)
            })
        },
        update(id) {
            axios.put('api/v1/categories/' + id, {
                name: this.form.name,
                description: this.form.description,
                parent_id: this.form.category.id
            })
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
                    console.error(error)
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
