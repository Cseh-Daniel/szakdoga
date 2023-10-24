<script setup>
import { router } from '@inertiajs/vue3';
import indexList from './Posts/indexList.vue';

//kigyűjtjük a meglevő filtereket
let query=new URLSearchParams(window.location.search);
//hozzáadjuk az új filter/sortot

function sort(){
query.append("profession",6);
router.get("/posts/filter",query);
}

</script>

<template>

    <Link href="/posts/create" as="button" class="btn btn-primary p-2 mb-3 me-2">
    <i class="bi bi-pen-fill"></i>
    Bejegyzés írása
    </Link>

    <button class="btn btn-warning p-2 mb-3" @click="sort()">teszt</button>

<indexList :posts="$page.props.posts.data"></indexList>

</template>


<style>
.w-90 {
    width: 90%;
}
</style>
