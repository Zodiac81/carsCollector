<template>
    <b-alert :show="show" :variant="status" @dismissed="cancelAlertData" dismissible>
        <p class="">{{ text }}</p>
    </b-alert>
</template>

<script>
export default {
    name: "AlertComponent",
    props: { show: Boolean, text: String, status: String },
    methods: {
        cancelAlertData() {
            this.$emit('cancelData', [this.show=false, this.status='', this.text=''])
        }
    }
}
</script>

