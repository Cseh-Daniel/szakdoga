<script setup>

let props=defineProps({
    links:Array
})

props.links.forEach(element => {
    if (!element.url) {
        element.url = "null";
    }
});


</script>


<template>
    <span v-for="link in links">

        <Link class="text-decoration-none" v-if="link.url != 'null'" :href="link.url" preserve-scroll>
        <li class="list-group-item" v-html="link.label" :class="{ 'fw-bold text-decoration-underline': link.active }" />
        </Link>

        <li v-else class="list-group-item" v-html="link.label"
            :class="{ 'fw-bold text-decoration-underline': link.active }" />

    </span>
</template>
