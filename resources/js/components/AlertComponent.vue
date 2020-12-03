<template>
    <div>
        <b-alert
            :show="dismissCountDown"
            :variant="variant"
            @dismiss-count-down="countDownChanged"
            @dismissed="dismissed"
            dismissible fade>
            {{ message }}
        </b-alert>
    </div>

</template>

<script>
export default {
    name: "AlertComponent",
    props: ['variant', 'message', 'dismissCountDown'],
    data() {
        return {
            dismissCounter: null
        }
    },
    methods: {
        countDownChanged(dismissCountDown) {
            this.dismissCounter = dismissCountDown
        },
        dismissed(){
            this.$emit('dismisse')
        }
    }
}
</script>

