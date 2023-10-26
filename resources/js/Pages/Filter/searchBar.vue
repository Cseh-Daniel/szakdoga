<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';


let search = reactive({
    yearMin: '',
    yearMax: '',
    title: '',
    profession: '',
    county: '',
    jobType: '',
    remote: '',
});

function handleSearch() {

    let filters = {};
    console.log(search.remote);
    for (const key in search) {

        if (search[key] !== '') {
            filters[key] = search[key];
        }
    }
    router.get('/posts/filter', filters,{preserveState: true});
}

</script>

<template>
    <div class="d-flex gap-2 mb-3 align-items-end">

        <div class="">
            <label for="" class="form-label">Munka éve</label>
            <div class="d-flex gap-2">
                <input v-model="search.yearMin" type="text" class="form-control" placeholder="Min">
                <input v-model="search.yearMax" type="text" class="form-control" placeholder="Max">
            </div>
        </div>

        <div class="">
            <label class="form-label">Cím</label>
            <input v-model="search.title" type="text" class="form-control" placeholder="Keresés cím alapján">
        </div>

        <div>
            <label class="form-label">Szakterület</label>
            <select v-model="search.profession" class="form-select form-select">
                <option value='' selected disabled>Válaszon</option>
                <option v-for="profession in $page.props.professions" :value="profession.id">
                    {{ profession.name }}
                </option>
            </select>
        </div>

        <div>
            <label class="form-label">Megye</label>
            <select v-model="search.county" class="form-select form-select">
                <option value="" selected :disabled="true">Válaszon</option>
                <option v-for="county in $page.props.counties" :value="county.id">{{ county.name }}</option>
            </select>
        </div>

        <div>
            <label for="" class="form-label">Munka típusa</label>
            <select v-model="search.jobType" class="form-select form-select">
                <option value="" selected disabled>Válasszon</option>
                <option :value='True'>Szakmai gyakorlat / gyakornok</option>
                <option :value='False'>Diákmunka</option>
            </select>
        </div>


        <div>
            <label for="" class="form-label">Távmunka</label>
            <select v-model="search.remote" class="form-select form-select">
                <option value="" selected disabled>Válasszon</option>
                <option value="1">Távmunka</option>
                <option value="0">Bejárós</option>
            </select>
        </div>
        <button class="btn btn-outline-primary" @click="handleSearch()">keresés</button>

    </div>
</template>
