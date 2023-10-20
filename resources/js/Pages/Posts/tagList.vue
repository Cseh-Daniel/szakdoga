<script setup>
// import { defineProps } from 'vue';
const props=defineProps(['post']);
</script>

<template>
            <div class="d-flex my-1 gap-1 fs-5">
                <div v-if="post.trainee" class="badge bg-info">
                    <a class="text-decoration-none text-black-50" href="/posts/filter/trainee">Gyakorlat</a>
                </div>
                <div v-else class="text-black-50 badge bg-info">
                   <a class="text-decoration-none text-black-50" href="/posts/filter/student">Diákmunka</a>
                </div>
                <div v-if="post.remote" class="text-black-50 badge bg-info">
                   <a class="text-decoration-none text-black-50" href="/posts/filter/remote">Távmunka</a>
                </div>
                <div class="text-black-50 badge bg-info">{{ post.county.name }}</div>
                <div class="text-black-50 badge bg-info">
                   <a class="text-decoration-none text-black-50" :href="'/posts/filter/profession/'+post.profession.id">{{ post.profession.name }}</a>
                </div>
                <div class="text-black-50 badge bg-info">{{ post.year }}</div>
                <div class="text-black-50 badge bg-info-subtle">{{ post.company }}</div>
                <div class="text-black-50 badge bg-info-subtle">{{ post.duration }}</div>
            </div>
</template>


