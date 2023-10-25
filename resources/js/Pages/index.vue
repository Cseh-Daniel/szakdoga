<script setup>
import { router } from '@inertiajs/vue3';
import indexList from './Posts/indexList.vue';
import pagination from '../Shared/pagination.vue';
import { ref } from 'vue';

//kigyűjtjük a meglevő filtereket
let query = new URLSearchParams(window.location.search);
//hozzáadjuk az új filter/sortot
let sort = query.has('sort')?ref(query.get('sort')):ref("0");



function sorter() {
    query.set('sort',sort.value);
    router.get("/posts/filter", query);
}

</script>

<template>
    <div class="d-flex align-items-center">
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

                <!-- <option value="year;DESC" selected>Év csökkenő</option>
                <option value="year;ASC">Év növekvő</option>
                <option value="created_at;ASC">Létrehozás növekvő</option>
                <option value="created_at;DESC">Létrehozás csökkenő</option> -->
            </select>
        </div>
    </div>

    <!-- <button class="btn btn-warning p-2 mb-3" @click="sort()">teszt</button> -->



    <indexList :posts="$page.props.posts.data"></indexList>

    <div class="d-flex justify-content-center align-items-center">
        <pagination :links="$page.props.posts.links"></pagination>
    </div>
</template>


<style>
.w-90 {
    width: 90%;
}
</style>
