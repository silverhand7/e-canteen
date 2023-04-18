<template>
    <App>
        <div class="container d-flex justify-content-center mt-5">
            <div class="w-50">
                <div class="card">
                    <div class="card-body">
                        <h2>Login Pembeli</h2>
                        <form @submit.prevent="submit">
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input v-model="loginForm.username" type="text" class="form-control" id="username" placeholder="Enter username">
                                <div v-if="errors.username" class="text-danger">
                                    {{ errors.username }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input v-model="loginForm.password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input v-model="loginForm.remember" type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">Remember me</label>
                            </div>
                            <button class="mt-3 btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';
import { router } from '@inertiajs/vue3'

export default {
    components: {
        App
    },
    props: {
        errors: Object
    },

    data() {
        return {
            loginForm: {
                username: null,
                password: null,
                remember: false,
            },
        }
    },

    methods: {
        submit() {
            router.post('/login', this.loginForm)
        }
    },
}

</script>
