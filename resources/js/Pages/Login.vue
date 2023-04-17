<template>
    <App>
        <div class="container d-flex justify-content-center mt-5">
            <div class="w-50">
                <div class="card">
                    <div class="card-body">
                        <h2>Login Pembeli</h2>
                        <form @submit.prevent="loginForm.post('login')">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input v-model="loginForm.email" type="text" class="form-control" id="username" placeholder="Enter email">
                                <div v-if="errors.email" class="text-danger">
                                    {{ errors.email }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input v-model="loginForm.password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input v-model="loginForm.remember" type="checkbox" class="form-check-input" id="check">
                                <label class="form-check-label" for="check">Remember me</label>
                            </div>
                            <button class="mt-3 btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </App>
</template>

<script>
import App from '@/layouts/App.vue';
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    components: {
        App
    },
    props: {
        errors: Object
    },
    setup() {
        const loginForm = useForm({
            email: '',
            password: '',
            remember: false
        });

        return { loginForm }
    }
}

</script>
