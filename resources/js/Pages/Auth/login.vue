<script setup>

import { useForm } from '@inertiajs/vue3';

const form = useForm({

    email: "",
    password: ""

});

</script>

<script>
export default {
    layout: null
}
</script>


<template>
    <div v-if="$page.props.flash.data" class="alert alert-success w-50 m-auto text-center fs-5" role="alert">
        {{ $page.props.flash.data }}
    </div>
    <div class="d-flex vh-100">



        <div class="border w-50 m-auto p-3 rounded-5">
            <h2 class="text-center">Bejelentkezés</h2>

            <div class="d-flex justify-content-center">
                <form action="#" method="post" @submit.prevent="form.post('/login')">
                    <div v-if="$page.props.errors.login"
                        class="p-3 rounded-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.login }}
                    </div>

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" v-model="form.email">
                        <div v-if="$page.props.errors.email"
                            class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                            {{ $page.props.errors.email }}
                        </div>
                    </div>

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="password">Jelszó</label>
                        <input class="form-control" type="password" name="password" v-model="form.password">
                        <div v-if="$page.props.errors.password"
                            class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                            {{ $page.props.errors.password }}
                        </div>
                    </div>

                    <div class="d-flex flex-row gap-3 p-2 mt-2 align-items-center">
                        <button class="btn btn-primary" type="submit">
                            Bejelentkezés
                        </button>
                        <Link href="/register">Regisztráció</Link>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
