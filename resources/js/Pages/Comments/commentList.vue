<script setup>
import commentEntry from './commentEntry.vue';
import { useForm } from '@inertiajs/vue3';
const url=window.location.href;
let urlParts=url.split("/");
let postId=urlParts[urlParts.length-1];

const props=defineProps(['comments']);

const form = useForm({
    text:'',
    post_id:`${postId}`
});

</script>

<template>
    <!-- komment body -->
    <div class="ms-5 me-5">
        <h5>Hozzászólások</h5>

        <!-- comment list -->
        <div class="d-flex justify-content-center">

            <!-- comment element -->
            <div class="ps-3 rounded w-50">

                <form class="mb-4" @submit.prevent="form.post('/comments')">
                    <div class="mb-3">
                        <label for="" class="form-label">Írj hozzászólást</label>
                        <textarea class="form-control" rows="3" v-model="form.text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Küldés</button>
                </form>

                <commentEntry v-if="props.comments" v-for="comment in props.comments" :name="comment.user.name">{{ comment.text }}</commentEntry>
                <div v-else>Még nincs hozzászólás</div>

            </div>
        </div>


    </div>
</template>
