<script setup>
// import { defineProps } from 'vue';
const props=defineProps(['post']);
</script>

<template>
            <div class="d-flex my-1 gap-1 fs-5">
                <div class="badge bg-secondary">{{ post.profession }}</div>
                <div class="badge bg-secondary">{{ post.company }}</div>
                <div class="badge bg-secondary">{{ post.year }}</div>
                <div class="badge bg-secondary">{{ post.duration }}</div>
                <div v-if="post.trainee" class="badge bg-secondary">Gyakorlat</div>
                <div v-else class="badge bg-secondary">Diákmunka</div>
                <div v-if="post.remote" class="badge bg-secondary">Távmunka</div>

            </div>
</template>


