<template>
    <form @submit.prevent="submitForm">
        <div class="input-group">
            <input type="text"
                   v-model="q"
                   :readonly="loading"
                   class="form-control"
                   placeholder="Введите Вашу строку">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary d-flex align-items-center"
                        :disabled="loading"
                        type="submit">
                    <span v-if="loading"
                          class="spinner-border spinner-border-sm mr-1"></span>
                    <span>Поиск</span>
                </button>
            </div>
        </div>
        <p class="text-danger">
            Данное поле должно быть строкой от 1 до 250 симвалов!
        </p>
    </form>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    import { required, minLength, maxLength } from 'vuelidate/lib/validators'


    export default {
        name: "InputComponent",
        mixins: [
            validationMixin
        ],

        data: () => ({
            loading: false,
            q: ''
        }),

        validations: {
            q: {
                required,
                minLength: minLength(1),
                maxLength: maxLength(250)
            },
        },

        methods: {
            submitForm () {
                this.$v.$touch()

                if (this.$v.$invalid) {
                    return
                }

                this.loading = true

                window.axios.post('/api/palindrome', {
                    q: this.q
                })

                // this.$emit('updateResults', [])
            }
        },
    }
</script>

<style scoped>

</style>
