<script setup>
const props=defineProps(['name']);
</script>

<template>
                    <div class="pt-2 border-bottom">
                        <span class="fw-bold fs-5">{{ props.name }}:
                        </span>
                        <p class="fs-4"><slot></slot></p>
                    </div>
</template>
