<script setup>

import { useForm } from '@inertiajs/vue3';

const form = useForm({

    email: "alma",
    password: "alma",

});

</script>

<script>
export default {
    layout: null
}
</script>


<template>
    <div class="d-flex vh-100">
        <div class="border w-50 m-auto p-3 rounded-5">
            <h2 class="text-center">Bejelentkezés</h2>

            <div class="d-flex justify-content-center">
                <form class="" action="#" method="post" @submit.prevent="form.post('/login')">

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>

                    <div class="mt-2 mb-3">
                        <label class="form-label" for="password">Jelszó</label>
                        <input class="form-control" type="password" name="email">
                    </div>

                    <div class="d-flex flex-row gap-3 p-2 mt-2 align-items-center">
                        <button class="btn btn-primary" type="submit">
                            Bejelentkezés
                        </button>
                        <Link href="/registration">Regisztráció</Link>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
