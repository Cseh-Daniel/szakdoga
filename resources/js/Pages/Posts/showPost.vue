<script setup>
import commentList from '../Comments/commentList.vue';
import { usePage } from '@inertiajs/vue3';
const post = usePage().props.post;
</script>

<template>
    <div class="border p-4 m-5 rounded-2">
        <div class="fs-5">{{ post.author }}</div>
        <h1>{{ post.title }}</h1>
        <p class="fs-3 ps-3 pe-3 rounded-2">{{ post.text }}</p>
    </div>

    <commentList :comments="$page.props.comments"></commentList>

</template>


