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

        <div class="d-flex flex-row my-2 border-bottom">
            <div class="me-auto p-2">
                <Link href="/" class="link-dark link-underline link-underline-opacity-0">
                <h3>Student Jobs</h3>
                </Link>
            </div>
            <!-- login component? -->
            <div v-if="$page.props.auth.user == null"
                class="p-2">
                <Link href="/login" as="button" class="btn btn-primary">Bejelentkezés</Link>
                <Link href="/register" class="m-3">Regisztráció</Link>
            </div>

            <div v-else class="flex-row-reverse p-2">
                <span class="border-end border-dark-subtle p-2">{{ $page.props.auth.user.username }}</span>
                <Link href="/logout" as="button" class="btn btn-outline-secondary ms-2" method="post">
                Kijelentkezés
                </Link>
            </div>
        </div>


        <!-- --------------------------------------------------------------- -->

        <div class="m-3">
            <slot></slot>
        </div>

        <!-- --------------------------------------------------------------- -->

       <div class="d-flex justify-content-center ">
         <p class="text-muted"><sub>Made for students</sub></p>
       </div>
        <!-- --------------------------------------------------------------- -->

    </body>

    </html>
</template>

<style></style>
