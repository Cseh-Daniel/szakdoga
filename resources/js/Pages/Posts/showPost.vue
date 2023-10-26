<script setup>
import commentList from '../Comments/commentList.vue';
import { usePage } from '@inertiajs/vue3';//?? -> $page.props
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import tagList from './tagList.vue';
import deleteModal from './deleteModal.vue';
import {isEditable} from '../../Shared/isEditable.js';


const post = usePage().props.post;

// let authName="";
// if (usePage().props.auth.user != null) {
//     authName = usePage().props.auth.user.username
// }else{
//     authName='guest';
// }
// const editable = authName == post.user.name;

const editable = isEditable(post.user.name);

const form = useForm({
    text: `${post.text}`
});

var isEditing = ref(false);

function editPost() {
    form.put('/posts/' + post.id);
    isEditing = ref(false);
}



</script>

<template>

    <div class="border p-4 m-5 rounded-2">
        <div class="fs-5"><u>{{ $page.props.post.user.name }}</u></div>
        <h1>{{ $page.props.post.title }}</h1>
        <tagList :post="$page.props.post" />


        <textarea readonly v-if="!isEditing" class="fs-5 rounded-2 form-control mb-2 p-4"
            rows="10">{{ $page.props.post.text }}</textarea>

        <form class="mb-2" v-else @submit.prevent="editPost()">
            <textarea class="form-control mb-1 fs-5 p-4" rows="10" v-model="form.text" placeholder="Szöveg"></textarea>
            <button type="submit" class="btn btn-sm btn-primary">Mentés</button>
        </form>
        <div class="d-flex gap-2">
            <button v-if="editable" class="btn btn-outline-secondary btn-sm"
                @click="isEditing = !isEditing">Szerkesztés</button>
            <deleteModal v-if="editable" :editable="editable" />
        </div>
    </div>

    <commentList :comments="$page.props.comments"></commentList>
</template>


<style>
.readArea{
    border: none;
}
</style>
