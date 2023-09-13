
<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({

    title: '',
    text: '',
});
</script>

<template>
    <h1>Bejegyzés létrehozása</h1>

    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">

        <form @submit.prevent="form.post('/posts')">

            <!-- form input component -->
            <div class="my-2">
                <input class="form-control" type="text" v-model="form.title" placeholder="Cím">
                <div v-if="$page.props.errors.title"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.title }}
                </div>
            </div>

            <!-- form input component -->
            <div class="my-2">
                <textarea class="form-control" rows="3" v-model="form.text" placeholder="Szöveg"></textarea>
                <div v-if="$page.props.errors.text"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.text }}
                </div>
            </div>


            <button type="submit" class="btn btn-primary my-2">Submit</button>

        </form>

    </div>
</template>

<style></style>
