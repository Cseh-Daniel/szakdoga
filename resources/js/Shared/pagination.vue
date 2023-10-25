<script setup>

import pagLink from './pagLink.vue';

let props = defineProps({
    links: Array
});
</script>

<template>
    <ul class="list-group list-group-horizontal-sm m-3">

        <pagLink :links="props.links"></pagLink>

    </ul>
</template>
