<script setup>
import commentList from '../Comments/commentList.vue';
import { usePage } from '@inertiajs/vue3';//?? -> $page.props
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import tagList from './tagList.vue';
import deleteModal from './deleteModal.vue';
import { isEditable } from '../../Shared/isEditable.js';


const post = usePage().props.post;
const editable = isEditable(post.user.id);

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


        <textarea v-model="form.text" :readonly="!isEditing" class="fs-5 rounded-2 form-control mb-2 p-4">{{ $page.props.post.text }}</textarea>

        <button v-if="isEditing" type="submit" class="mb-2 btn btn-sm btn-primary" @click="editPost()">Mentés</button>

        <div class="d-flex gap-2">
            <button v-if="editable" class="btn btn-outline-secondary btn-sm"
                @click="isEditing = !isEditing">Szerkesztés</button>
            <deleteModal v-if="editable" :editable="editable" />
        </div>
    </div>

    <commentList :comments="$page.props.comments"></commentList>
</template>


<style>
.readArea {
    border: none;
}
</style>
