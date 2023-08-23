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
    <h2>Bejelentkezés</h2>

    <form action="#" method="post" @submit.prevent="form.post('/login')">

        <label for="email">E-mail:</label>
        <input type="email" name="email">

        <label for="email">Jelszó</label>
        <input type="password" name="email">

        <button type="submit">
            Bejelentkezés
        </button>
    </form>


</template>
