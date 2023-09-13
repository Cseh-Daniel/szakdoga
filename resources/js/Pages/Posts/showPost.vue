<script setup>
import { usePage } from '@inertiajs/vue3';
const post=usePage().props.post;
console.log(post);
</script>

<template>

<div class="border p-4 m-5 rounded-2">
    <h2>{{ post.title }}</h2>
    <p class="fs-5 bg-secondary-subtle p-3 rounded-2">{{ post.text }}</p>
</div>
</template>


