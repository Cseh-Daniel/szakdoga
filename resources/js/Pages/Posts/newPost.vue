
<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({

    title: '',
    text: '',
    profession: '',
    year: '',
    duration: '',
    company: '',
    trainee: '',
    remote:null,

});
</script>

<template>
    <h1>Bejegyzés létrehozása</h1>

    <div class="d-flex flex-column justify-content-center shadow-sm w-90 p-3 m-auto rounded-3 border border-top-0">

        <form @submit.prevent="form.post('/posts')">

            <!-- form input component -->
            <div class="my-2">
                <input required class="form-control" type="text" v-model="form.title" placeholder="Cím">
                <div v-if="$page.props.errors.title"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.title }}
                </div>
            </div>

            <!-- form input component -->
            <div class="my-2">
                <textarea required class="form-control" rows="3" v-model="form.text" placeholder="Szöveg"></textarea>
                <div v-if="$page.props.errors.text"
                    class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                    {{ $page.props.errors.text }}
                </div>
            </div>
            <!-- //----------------------------------------------------- -->
            <div class="d-flex gap-2 my-2">

<div>
                    <input required class="form-control" type="text" v-model="form.profession" placeholder="Szakterület">
                    <div v-if="$page.props.errors.profession"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.profession }}
                    </div>
</div>

<div>
                    <input required class="form-control" type="text" v-model="form.year" placeholder="Év">
                    <div v-if="$page.props.errors.year"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.year }}
                    </div>
</div>

<div>
                    <input required class="form-control" type="text" v-model="form.duration"
                        placeholder="Mennyi ideig tartott?">
                    <div v-if="$page.props.errors.duration"
                        class="p-1 rounded-bottom-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle">
                        {{ $page.props.errors.duration }}
                    </div>
</div>

<div>
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



            <button type="submit" class="btn btn-primary my-2">Submit</button>

        </form>

    </div>
</template>

<style></style>
