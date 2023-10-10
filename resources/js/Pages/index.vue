<script setup>

</script>

<template>


    <!-- <div class="alert alert-success alert-dismissible">
        <strong>Success!</strong> Indicates a successful or positive action.
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

    <div class="alert alert-success">
        szöveg
        szöveg
        szöveg
        szöveg
    </div> -->

    <Link href="/posts/create" as="button" class="btn btn-primary p-2 mb-3">
    <i class="bi bi-pen-fill"></i>
    Bejegyzés írása
    </Link>

    <!-- kiemelni content list component-be -->
    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">
        <!-- List element component?? -->
        <p class="align-text-bottom border-bottom p-2 rounded-2 shadow-sm fs-4" v-for="post in $page.props.posts">
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


<style>
.w-90 {
    width: 90%;
}
</style>
