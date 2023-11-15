<script setup>

import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
})

</script>

<script>
export default {
    layout: null
}
</script>

<template>
    <div class="d-flex vh-100">
        <div class="border w-50 m-auto p-3 rounded-5">
            <h2 class="text-center">Regisztráció</h2>

            <div class="d-flex justify-content-center">
                <form action="#" method="post" @submit.prevent="form.post('/register')">

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="name">Név</label>
                        <input class="form-control" type="name" name="name" v-model="form.name">
                        <div v-if="$page.props.errors.name"
                            class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                            {{ $page.props.errors.name }}
                        </div>
                    </div>

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="email">E-mail</label>
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
                    <div class="mt-2 mb-3">
                        <label class="form-label" for="password_confirmation">Jelszó megerősítés</label>
                        <input class="form-control" type="password" name="password_confirmation" v-model="form.password_confirmation">
                    </div>

                    <div class="d-flex flex-row gap-3 p-2 mt-2 align-items-center">
                        <button class="btn btn-primary" type="submit">
                            Regisztráció
                        </button>
                        <div class="p-2 border-dark-subtle border-start">
                            Van már fiókja?<Link href="/login" class="p-1">Lépjen be!</Link>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped></style>
