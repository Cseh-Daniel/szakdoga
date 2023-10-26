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

form.defaults();

function formSubmit(){
    form.post('/comments');
    form.reset();
}

</script>

<template>
    <!-- komment body -->
    <div class="ms-5 me-5">
        <h5>Hozzászólások</h5>

        <!-- comment list -->
        <div class="d-flex justify-content-center">

            <!-- comment element -->
            <div class="ps-3 rounded w-50">

                <form class="mb-4" @submit.prevent="formSubmit()">
                    <div class="mb-3">
                        <label for="" class="form-label">Írj hozzászólást</label>
                        <textarea v-if="$page.props.auth.user==null" class="form-control fs-4" rows="3" :disabled="($page.props.auth.user==null)" value="Hozzászóláshoz jelentkezzen be!" />
                        <textarea v-else class="form-control" rows="3" v-model="form.text"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Küldés</button>
                </form>

                <!-- <commentEntry v-if="props.comments" v-for="comment in props.comments" :name="comment.user.name" :id="comment.id" :key="comment.id">{{ comment.text }}</commentEntry> -->
                <commentEntry v-if="props.comments" v-for="comment in props.comments" :key="comment.id" :comment="comment"/>

                <div v-else>Még nincs hozzászólás</div>

            </div>
        </div>


    </div>
</template>
