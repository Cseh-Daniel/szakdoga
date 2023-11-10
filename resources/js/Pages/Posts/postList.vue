<script setup>
import tagList from './tagList.vue';
const props = defineProps(['posts']);
</script>

<template>
    <div class="d-flex flex-column justify-content-center mx-5 shadow-sm p-3 m-auto rounded-3 border border-top-0">
        <div v-for="post in props.posts">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <span class="">
                    <Link class="fs-3 text-black text-decoration-none fw-bold" :href="'/posts/' + post.id">
                    {{ post.title }}<br>
                    </Link>
                    {{ post.created_at.substr(0, 19).replace('T', ' ') }}
                </span>
                <span class="fs-6">
                    {{ post.user.name }}
                </span>
            </div>
            <tagList :post="post" />
            <p class="align-text-bottom border-bottom py-3 px-5 rounded-2 shadow-sm fs-4 text-break">
                {{ post.text.substr(0, 150) }}...
            </p>
        </div>

    </div>
</template>
