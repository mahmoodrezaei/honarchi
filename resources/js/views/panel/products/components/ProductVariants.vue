<template>
    
</template>

<script>
    export default {
        name: "ProductVariants",

        data() {
            return {
                id: this.$route.params.id,

                isSimple: '',

                sending: false,
            }
        },

        created() {
            this.retrieveProductVariants();
        },

        methods: {
            retrieveProductVariants() {
                axios.get(`/api/admin/products/{this}/variants`)
                    .then(response => {
                        this.isSimple = response.data.product.is_simple
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            console.log(errors.response.data);
                        }
                    });
            },

            submit() {
                this.sending = true;
                axios.post(`/api/admin/products/${this.id}/variants`)
                    .then(response => {
                        if (response.status === 200) {
                            flash(response.data.message);
                        }
                        this.sending = false;
                    })
                    .catch(errors => {
                        if (errors.message === 'Network Error') {
                            flash('خطایی در اتصال به شبکه رخ داده است', 'warning');
                        } else {
                            switch (errors.response.status) {
                                case 422:
                                    this.errors = errors.response.data.errors;
                                    break;
                                case 500:
                                    break;
                                default:
                                    console.log(errors.response);
                            }
                        }

                        console.log(errors.response);
                        this.sending = false;
                    });
            }
        }
    }
</script>

<style scoped>

</style>