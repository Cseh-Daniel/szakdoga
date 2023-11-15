
<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({

    title: '',
    text: '',
    profession_id: '',
    year: '',
    duration: '',
    durationType:'',
    company: '',
    trainee: '',
    remote: '',
    county_id: ''

});

function saveForm() {

    form.post('/posts');
}

</script>

<template>
    <h1>Bejegyzés létrehozása</h1>

    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">

        <form @submit.prevent="saveForm">

            <div class="my-2">
                <input required class="form-control" type="text" v-model="form.title" placeholder="Cím">
                <div v-if="$page.props.errors.title"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.title }}
                </div>
            </div>

            <div class="my-2">
                <textarea required class="form-control" rows="3" v-model="form.text" placeholder="Szöveg"></textarea>
                <div v-if="$page.props.errors.text"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.text }}
                </div>
            </div>

            <div class="d-flex gap-2 my-2">

                <div>
                    <div class="mb-2">
                        <label class="form-label">Szakterület</label>
                        <select v-model="form.profession_id" class="form-select form-select-lg">
                            <option value='' selected disabled>Válaszon</option>
                            <option v-for="profession in $page.props.professions" :value="profession.id">
                                {{ profession.name }}
                            </option>
                        </select>
                    </div>

                    <div v-if="$page.props.errors.profession_id"
                        class="p-1 rounded-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.profession_id }}
                    </div>
                </div>

                <div>

                    <div class="mb-2">
                        <label class="form-label">Vármegye</label>
                        <select v-model="form.county_id" class="form-select form-select-lg">
                            <option value="" selected :disabled="true">Válaszon</option>
                            <option v-for="county in $page.props.counties" :value="county.id">{{ county.name }}</option>
                        </select>
                    </div>

                    <div v-if="$page.props.errors.county_id"
                        class="p-1 rounded-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.county_id }}
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">Mikor</label>
                    <input required class="form-control" type="text" v-model="form.year" placeholder="Év">
                    <div v-if="$page.props.errors.year"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.year }}
                    </div>
                </div>

                <div>
                    <label class="form-label">Hossza</label>
                    <div class="input-group">
                        <input required class="form-control w-50" type="text" v-model="form.duration"
                            placeholder="Mennyi ideig tartott?">
                        <select required v-model="form.durationType" class="form-control w-auto">
                            <option value="" selected disabled>Válaszon</option>
                            <option value="0">óra</option>
                            <option value="1">nap</option>
                            <option value="2">hét</option>
                            <option value="3">hónap</option>

                        </select>
                    </div>
                    <div v-if="$page.props.errors.duration"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.duration }}
                    </div>
                </div>

                <div>
                    <label class="form-label">Hol</label>
                    <input required class="form-control" type="text" v-model="form.company" placeholder="Cég / munkáltató">
                    <div v-if="$page.props.errors.company"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.company }}
                    </div>
                </div>

            </div>

            <div class="d-flex gap-2 my-2">
                <div>
                    <label for="" class="form-label">Munka típusa</label>
                    <select required v-model="form.trainee" class="form-select form-select-lg">
                        <option value="" selected disabled>Válasszon</option>
                        <option :value="true">Szakmai gyakorlat / gyakornok</option>
                        <option :value="false">Diákmunka</option>
                    </select>
                    <div v-if="$page.props.errors.trainee"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.trainee }}
                    </div>
                </div>

                <div>
                    <label for="" class="form-label">Távmunka lehetőség</label>
                    <select required v-model="form.remote" class="form-select form-select-lg">
                        <option value="" selected disabled>Válasszon</option>
                        <option :value=true>Volt lehetőség</option>
                        <option :value=false>Nem volt</option>
                        <option :value=null>Nem tudom</option>
                    </select>
                    <div v-if="$page.props.errors.remote"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.remote }}
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-primary my-2">Létrehozás</button>

        </form>

    </div>
</template>

<style></style>
