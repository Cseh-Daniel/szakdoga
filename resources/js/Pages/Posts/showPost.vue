<script setup>
import commentList from '../Comments/commentList.vue';
import { usePage } from '@inertiajs/vue3';//?? -> $page.props
import { useForm } from '@inertiajs/vue3';

const post = usePage().props.post;//?? -> $page.props

const form=useForm({
    text:`${post.text}`
});

function editPost(){
    form.put('/posts/'+post.id);
}
</script>

<template>
    <div class="border p-4 m-5 rounded-2">
        <div class="fs-5"><u>{{ post.author }}</u></div>
        <h1>{{ post.title }}</h1>
        <p class="fs-3 ps-3 pe-3 rounded-2">{{ post.text }}</p>
        <button class="btn btn-outline-secondary btn-sm"> Szerkesztés</button>
    </div>
    <!-- <button class="btn btn-primary" @click="editPost()">szerkesztés {{ post.id }}</button> -->

    <commentList :comments="$page.props.comments"></commentList>

</template>


