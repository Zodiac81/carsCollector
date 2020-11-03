<template>
    <div>
        <b-alert :show="dismissCountDown" :variant="variant" @dismiss-count-down="countDownChanged" dismissible fade>
            {{ message }}
        </b-alert>
    </div>

</template>

<script>
export default {
    name: "AlertComponent",
    props: ['show', 'variant', 'message', 'dismissCountDown'],
    data() {
        return {
            dismissCounter: ''
        }
    },
    methods: {
        countDownChanged(dismissCountDown) {
            this.dismissCounter = dismissCountDown
        }
    }
}
</script>

