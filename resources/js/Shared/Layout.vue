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
        <!-- -------------------------------------------------------------------- -->
        <h3>nav</h3>
        <div v-if="$page.props.auth.user == null" class="d-flex flex-row-reverse gap-3 p-2 align-items-center">
            <Link href="/register">Regisztráció</Link>
            <Link href="/login" as="button" class="btn btn-primary">Bejelentkezés</Link>
        </div>
        <div v-else class="d-flex flex-row-reverse gap-3 p-2 align-items-center">
            <Link href="/logout" as="button" class="btn btn-outline-secondary" method="post">
                Kijelentkezés
            </Link>
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
