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
            Gyakorlat / Gyakornok <i class="bi bi-link-45deg"></i>
        </div>
        <div v-else class="text-black-50 badge bg-info tagLink" @click="filterPosts('jobType',post.trainee)">
            Diákmunka <i class="bi bi-link-45deg"></i>
        </div>

        <div v-if="post.remote" class="text-black-50 badge bg-info tagLink" @click="filterPosts('remote',post.remote)">
            Távmunka <i class="bi bi-link-45deg"></i>
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('county',post.county.id)">
            {{ post.county.name }} <i class="bi bi-link-45deg"></i>
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('profession',post.profession.id)">
                {{ post.profession.name }} <i class="bi bi-link-45deg"></i>
        </div>

        <div class="text-black-50 badge bg-info tagLink" @click="filterPosts('inYear',post.year)">{{ post.year }} <i class="bi bi-link-45deg"></i></div>

        <div class="text-black-50 badge bg-info-subtle">{{ post.company }}</div>
        <div class="text-black-50 badge bg-info-subtle">{{ post.duration }}</div>
    </div>
</template>

<style>
.tagLink {
    cursor: pointer;
}
</style>
