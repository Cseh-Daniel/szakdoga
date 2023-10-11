<script setup>

import indexList from './Posts/indexList.vue';

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

<indexList :posts="$page.props.posts"></indexList>

</template>


<style>
.w-90 {
    width: 90%;
}
</style>
