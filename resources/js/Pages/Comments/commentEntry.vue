<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
const props = defineProps(['name', 'id']);

let uname="";
if (usePage().props.auth.user != null) {
    uname = usePage().props.auth.user.username
}else{
    uname='guest';
}
const editable = uname == props.name;


let del = ref(false);

function delClick() {
    del.value = !del.value;
    console.log(del.value);
}

</script>

<template>
    <div class="pt-2 border-bottom">
        <span class="fw-bold fs-5">{{ props.name }}:
        </span>
        <p class="fs-4">
            <slot></slot>
        </p>

        <div class="d-flex gap-2">
            <button v-if="editable" class="btn btn-outline-danger btn-sm" @click="delClick()"><i
                    class="bi bi-trash"></i></button>

            <Link v-if="del" as="button" class="btn btn-danger btn-sm" method="delete" :href="'/comments/'+props.id">Törlés</Link>
        </div>

    </div></template>
