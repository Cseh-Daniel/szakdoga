import { usePage } from "@inertiajs/vue3";

function isEditable(id) {

    let authId = "";
    if (usePage().props.auth.user != null) {
        authId = usePage().props.auth.user.id
    } else {
        authId = 0;
    }

    if (id == authId) {
        return true;
    } else {
        return false;
    }

}

export { isEditable }
