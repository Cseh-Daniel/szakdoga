<script setup>

</script>

<template>
    <!DOCTYPE html>
    <html lang="hu">

    <Head>
        <title>Student Jobs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </Head>

    <body>
        <!-- -----------------------------navbarba componentbe külön szedni--------------------------------------- -->
        <div class="d-inline-flex flex-row w-50">
            <h3>Student Jobs</h3>
        </div>
        <!-- login component? -->
        <div v-if="$page.props.auth.user == null" class="d-inline-flex flex-row-reverse gap-3 p-2 align-items-center w-50">
            <Link href="/register">Regisztráció</Link>
            <Link href="/login" as="button" class="btn btn-primary">Bejelentkezés</Link>
        </div>

        <div v-else class="d-inline-flex flex-row-reverse gap-3 p-2 align-items-center w-50">
            <Link href="/logout" as="button" class="btn btn-outline-secondary" method="post">
            Kijelentkezés
            </Link>
            <span class="border-end border-dark-subtle p-2">{{ $page.props.auth.user.username }}</span>
        </div>

        <!-- --------------------------------------------------------------- -->
        <hr>
        <slot></slot>

        <hr>
        <!-- --------------------------------------------------------------- -->

        <h3>footer</h3>
        <!-- --------------------------------------------------------------- -->

    </body>

    </html>
</template>

<style></style>
