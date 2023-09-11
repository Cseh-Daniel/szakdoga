
<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({

    title: '',
    txt: ''

});
</script>

<template>
    <h1>Bejegyzés létrehozása</h1>

    <form @submit.prevent="form.post('/posts')">
        <input class="form-control" type="text" name="title" v-model="form.title" placeholder="Cím">

        <textarea class="form-control" name="" id="" rows="3" v-model="form.txt" placeholder="Szöveg"></textarea>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</template>

<style></style>
