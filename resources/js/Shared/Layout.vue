<script setup>
import navBar from './navBar.vue';

</script>

<template>
    <!DOCTYPE html>
    <html lang="hu">

    <Head>
        <title>Student Jobs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </Head>

    <body>
        <nav-bar></nav-bar>

        <div class="m-3">
            <slot></slot>
        </div>

        <div class="d-flex justify-content-center ">
            <p class="text-muted"><sub>Made for students</sub></p>
        </div>

    </body>

    </html>
</template>

<style></style>
