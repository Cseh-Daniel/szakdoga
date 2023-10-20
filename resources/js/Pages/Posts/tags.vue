<script setup>
// import { defineProps } from 'vue';
const props=defineProps(['post']);
</script>

<template>
    //componentbe kiemelni props:post,clickable
            <div class="d-flex my-1 gap-1 fs-5">
                <div v-if="post.trainee" class="text-black-50 badge bg-info">Gyakorlat</div>
                <div v-else class="text-black-50 badge bg-info">Diákmunka</div>
                <div v-if="post.remote" class="text-black-50 badge bg-info">Távmunka</div>
                <div class="text-black-50 badge bg-info">{{ post.profession }}</div>
                <div class="text-black-50 badge bg-info">{{ post.year }}</div>
                <div class="text-black-50 badge bg-info-subtle">{{ post.company }}</div>
                <div class="text-black-50 badge bg-info-subtle">{{ post.duration }}</div>

            </div>
</template>


