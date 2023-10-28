<script setup>
import { router } from '@inertiajs/vue3';
import postList from './Posts/postList.vue';
import pagination from '../Shared/pagination.vue';
import { ref } from 'vue';

import searchBar from './Filter/searchBar.vue';

//kigyűjtjük a meglevő filtereket
let query = new URLSearchParams(window.location.search);
//hozzáadjuk az új filter/sortot
let sort = query.has('sort') ? ref(query.get('sort')) : ref("0");



function sorter() {
    query.set('sort', sort.value);
    router.get("/posts/filter", query, { preserveState: true });
}

</script>

<template>
    <div class="d-flex justify-content-center">
        <searchBar></searchBar>
    </div>
    <div class="d-flex align-items-center justify-content-between w-90 mx-auto">
        <Link href="/posts/create" as="button" class="btn btn-primary p-2 h-50 mb-3 me-2">
        <i class="bi bi-pen-fill"></i>
        Bejegyzés írása
    </Link>

        <div class="mb-3">
            <select v-model="sort" @change="sorter" class="form-select form-select-lg">
                <option value="0" selected>Munka éve csökkenő</option>
                <option value="1">Munka éve növekvő</option>
                <option value="2">Létrehozás csökkenő</option>
                <option value="3">Létrehozás növekvő</option>
            </select>
        </div>
    </div>


    <postList :posts="$page.props.posts.data"></postList>

    <div class="d-flex justify-content-center align-items-center">
        <pagination :links="$page.props.posts.links"></pagination>
    </div>
</template>


<style>
.w-90 {
    width: 90%;
}
</style>
