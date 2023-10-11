<script setup>
import commentEntry from './commentEntry.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    text: '',
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

                <form class="mb-4" @submit.prevent="form.post('/comment')">
                    <div class="mb-3">
                        <label for="" class="form-label">Írj hozzászólást</label>
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Küldés</button>
                </form>

                <commentEntry name="barack">Főő komment</commentEntry>

            </div>
        </div>


    </div>
</template>
