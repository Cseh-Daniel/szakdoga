import { usePage } from "@inertiajs/vue3";

function isEditable(name){

    let authName="";
    if (usePage().props.auth.user != null) {
        authName = usePage().props.auth.user.username
    }else{
        authName='guest';
    }

    if(name == authName){
        return true;
    }else{
        return false;
    }

}

export{isEditable}
