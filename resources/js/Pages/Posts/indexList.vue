<script setup>
import tagList from './tagList.vue';
const props = defineProps(['posts']);
</script>

<template>
    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">
        <!-- List element -->

        <div v-for="post in props.posts">
            <div class="d-flex flex-row align-items-center justify-content-between">
                <span class="fs-3">
                    <Link class="text-black text-decoration-none fw-bold" :href="'/posts/' + post.id">
                    {{ post.title }}
                    </Link>
                </span>
                <span class="fs-6">
                    {{ post.user.name }}
                </span>
            </div>
            <tagList :post="post"/>
            <p class="align-text-bottom border-bottom py-3 px-5 rounded-2 shadow-sm fs-4 text-break">
                {{ post.text.substr(0,150) }}...
            </p>
        </div>

    </div>
</template>
