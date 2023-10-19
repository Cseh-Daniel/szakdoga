<script setup>
const props = defineProps(['href']);
</script>

<template>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
       Törlés
    </button>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Bejegyzés törlése</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Biztosan törölni szeretné a bejegyzést?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                    <button type="button" class="btn btn-danger">Törlés</button>
                </div>
            </div>
        </div>
    </div>
</template>
