import { usePage } from "@inertiajs/vue3";

function isEditable(id) {

    let authId = "";
    if (usePage().props.auth.user != null) {

        authId = usePage().props.auth.user.id

        if (id == authId || usePage().props.auth.user.role_id == 1) {
            return true;
        }
    } else {
        return false;
    }

}

export { isEditable }
