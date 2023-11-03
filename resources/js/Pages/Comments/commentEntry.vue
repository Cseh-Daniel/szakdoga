<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps(['name', 'comment']);

import { isEditable } from '../../Shared/isEditable';

const editable = isEditable(props.comment.user.id);


let deleteComment = ref(false);

let isEditing = ref(false);

function showDelete() {
    deleteComment.value = !deleteComment.value;
    console.log(deleteComment.value);
}

function showEdit() {
    isEditing.value = !isEditing.value;
}

function updateComment() {
    showEdit();
    router.put('/comments/' + props.comment.id,{text:props.comment.text});
}

</script>

<template>
    <div class="pt-2 border-bottom">
        <span class="fw-bold fs-5">{{ props.comment.user.name }}:
        </span>
        <p v-if="!isEditing" class="fs-4">
            {{ props.comment.text }}
        </p>
        <div v-else class="m-2">
            <textarea v-model="props.comment.text" class="form-control fs-4"></textarea>
            <button class="btn btn-primary btn-sm" @click="updateComment()">Mentés<i class="bi bi-save"></i></button>
        </div>

        <div v-if="editable" class="d-flex gap-2">
            <button class="btn btn-outline-primary btn-sm" @click="showEdit()"><i class="bi bi-pencil"></i></button>
            <button class="btn btn-outline-danger btn-sm" @click="showDelete()"><i class="bi bi-trash"></i></button>
            <Link v-if="deleteComment" as="button" class="btn btn-danger btn-sm" method="delete"
                :href="'/comments/' + props.comment.id">Törlés
            </Link>
        </div>

    </div>
</template>
