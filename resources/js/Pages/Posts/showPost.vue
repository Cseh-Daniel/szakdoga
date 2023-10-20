<script setup>
import commentList from '../Comments/commentList.vue';
import { usePage } from '@inertiajs/vue3';//?? -> $page.props
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

import tags from './tags.vue';
import deleteModal from './deleteModal.vue';

const post = usePage().props.post;//?? -> $page.props
const uname = usePage().props.auth.user.username;
const editable = uname == post.author;

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
        <div class="fs-5"><u>{{ $page.props.post.author }}</u></div>
        <h1>{{ $page.props.post.title }}</h1>
        <tags :post="$page.props.post" />
        <p v-if="!isEditing" class="fs-3 ps-3 pe-3 rounded-2">{{ $page.props.post.text }}</p>

        <form class="mb-2" v-else @submit.prevent="editPost()">
            <textarea class="form-control mb-1" rows="3" v-model="form.text" placeholder="Szöveg"></textarea>
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


