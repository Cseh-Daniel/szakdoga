<script setup>
</script>

<template>
    <div class="d-flex justify-content-between align-items-center my-2 border-bottom">
        <div class="p-2">
            <Link href="/" class="link-dark link-underline link-underline-opacity-0">
            <h3>Student Jobs</h3>
            </Link>
        </div>

        <div v-if="$page.props.auth.user == null" class="p-2">
            <Link href="/login" as="button" class="btn btn-primary">Bejelentkezés</Link>
            <Link href="/register" class="m-3">Regisztráció</Link>
        </div>

        <div v-else class="flex-row-reverse p-2">
            <span class="border-end border-dark-subtle p-2">{{ $page.props.auth.user.name }}</span>
            <Link href="/logout" as="button" class="btn btn-outline-secondary ms-2" method="post">
            Kijelentkezés
            </Link>
        </div>
    </div>
</template>
