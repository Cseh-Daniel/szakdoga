<script setup>
import { router } from '@inertiajs/vue3';
import indexList from './Posts/indexList.vue';
import pagination from '../Shared/pagination.vue';
import { ref } from 'vue';

//kigyűjtjük a meglevő filtereket
let query = new URLSearchParams(window.location.search);
//hozzáadjuk az új filter/sortot
let sort = query.has('sort') ? ref(query.get('sort')) : ref("0");



function sorter() {
    query.set('sort', sort.value);
    router.get("/posts/filter", query);
}

</script>

<template>
    <div class="d-flex align-items-center justify-content-between">
        <Link href="/posts/create" as="button" class="btn btn-primary p-2 h-50 mb-3 me-2">
        <i class="bi bi-pen-fill"></i>
        Bejegyzés írása
        </Link>

        <div class="d-flex gap-2 mb-3">

            <div class="">
                <label for="" class="form-label">Munka éve</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" placeholder="Min">
                    <input type="text" class="form-control" placeholder="Max">
                </div>
            </div>

            <div class="">
                <label class="form-label">Cím</label>
                <div class="">
                    <input type="text" class="form-control h-25" placeholder="Keresés cím alapján">
                </div>
            </div>

            <div>
                <label class="form-label">Szakterület</label>
                <select class="form-select form-select">
                    <option value='' selected disabled>Válaszon</option>
                    <!-- <option v-for="profession in $page.props.professions" :value="profession.id">
                        {{ profession.name }}
                    </option> -->
                </select>
            </div>

            <div>
                <label class="form-label">Megye</label>
                <select class="form-select form-select">
                    <option value="" selected :disabled="true">Válaszon</option>
                    <!-- <option v-for="county in $page.props.counties" :value="county.id">{{ county.name }}</option> -->
                </select>
            </div>

            <div>
                <label for="" class="form-label">Munka típusa</label>
                    <select required class="form-select form-select">
                        <option value="" selected disabled>Válasszon</option>
                        <option :value="true">Szakmai gyakorlat / gyakornok</option>
                        <option :value="false">Diákmunka</option>
                    </select>
            </div>

            <button class="btn btn-outline-primary h-25 my-auto">keresés</button>

        </div>


        <div class="mb-3">
            <select v-model="sort" @change="sorter" class="form-select form-select-lg">
                <option value="0" selected>Munka éve csökkenő</option>
                <option value="1">Munka éve növekvő</option>
                <option value="2">Létrehozás csökkenő</option>
                <option value="3">Létrehozás növekvő</option>
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
