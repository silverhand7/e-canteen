<template>
    <App>
        <div class="container d-flex justify-content-center mt-5">
            <div class="w-50">
                <div class="card">
                    <div class="card-body">
                        <h2>Register Pembeli</h2>
                        <form @submit.prevent="submit">
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Masukan nama">
                                <div v-if="errors.name" class="text-danger">
                                    {{ errors.name }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input v-model="form.username" type="text" class="form-control" id="username" placeholder="Masukan username">
                                <div v-if="errors.username" class="text-danger">
                                    {{ errors.username }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input v-model="form.password" type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Jabatan</label>
                                <input v-model="form.jabatan" type="text" class="form-control" id="jabatan" placeholder="Masukan jabatan">
                            </div>
                            <button class="mt-3 btn btn-primary w-100">Register</button>
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
            form: {
                username: null,
                name: null,
                jabatan: null,
                password: null,
            },
        }
    },
    methods: {
        submit() {
            router.post('/register', this.form)
        }
    }
}
</script>