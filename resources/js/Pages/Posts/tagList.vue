<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps(['post']);

function filterPosts(name,value) {
    let query={};
    query[name]=value;
    router.get('/posts/filter',{...query});
}

</script>

<template>
    <div class="d-flex my-1 gap-1 fs-5">
        <div v-if="post.trainee" class="text-black-50 badge bg-info tagLink" @click="filterPosts('jobType',post.trainee)">
            Gyakorlat / Gyakornok
        </div>
        <div v-else class="text-black-50 badge bg-info tagLink" @click="filterPosts('jobType',post.trainee)">
            Diákmunka
        </div>

        <div v-if="post.remote" class="text-black-50 badge bg-info tagLink" @click="filterPosts('remote',post.remote)">
            Távmunka
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('county',post.county.id)">
            {{ post.county.name }}
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('profession',post.profession.id)">
                {{ post.profession.name }}
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('inYear',post.year)">{{ post.year }}</div>

        <div class="text-black-50 badge bg-info-subtle">{{ post.company }}</div>
        <div class="text-black-50 badge bg-info-subtle">{{ post.duration }}</div>
    </div>
</template>

<style>
.tagLink {
    cursor: pointer;
}
</style>
