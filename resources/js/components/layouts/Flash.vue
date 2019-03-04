<template>
    <div id="custom-alert"
         class="m-alert m-alert--icon alert"
         :class="'alert-'+type"
         v-show="show"
         role="alert">
            <div class="m-alert__icon">
<!--                <i v-if="this.type == 'warning'" class="la la-warning"></i>-->
                <i class="la" :class="this.type == 'warning' ? 'la-warning' : 'la-check'"></i>
            </div>
            <div class="m-alert__text">
                <strong v-text="body"></strong>
            </div>
            <div class="m-alert__close">
                <button type="button" class="close" data-close="alert" aria-label="Hide">
                </button>
            </div>
    </div>
</template>

<script>
    export default {
        props: ['message', 'level'],

        data() {
            return {
                body: this.message,
                type: this.level || 'success',
                show: false,
                timeOut: 3500
            }
        },

        created() {
            /*if (this.message) {
                this.flash()
            }*/

            window.events.$on(
                'flash', data => this.flash(data)
            )
        },

        methods: {
            flash(data) {
                if (data) {
                    this.body = data.message
                    this.type = data.level
                }

                this.show = true

                this.hide()
            },

            hide() {
                setTimeout(() => {
                    this.show = false
                }, this.timeOut)
            }
        }
    }
</script>

<style>
    @media ( min-width: 768px ) {
        #custom-alert {
            position: absolute;
            width: 500px;
            left: 50px;
            top: 110px;
        }
    }
</style>