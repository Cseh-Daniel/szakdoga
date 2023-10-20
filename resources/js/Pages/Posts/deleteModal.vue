<script setup>
const props = defineProps(['href','editable']);
</script>

<template>
    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Törlés
    </button>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bejegyzés törlése</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Biztosan törölni szeretné a bejegyzést?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégsem</button>

                    <Link as="button" :href="$page.props.post.id" method="delete" v-if="editable"
                        class="btn btn-danger" data-bs-dismiss="modal">Törlés</Link>
                </div>
            </div>
        </div>
    </div>
</template>
