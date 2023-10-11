<script setup>

const props= defineProps(['posts'])

</script>

<template>


    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">
<!-- List element -->
        <p class="align-text-bottom border-bottom p-2 rounded-2 shadow-sm fs-4" v-for="post in props.posts">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <span class="fs-3">
               <Link :href="'/posts/'+post.id">
                {{ post.title }}
               </Link>
            </span>
            <span class="fs-6">
                {{ post.user.name }}
            </span>
        </div>

        {{ post.text }}
        </p>

    </div>

</template>
