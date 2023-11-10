<script setup>
</script>

<script>
export default {
    layout: null
}
</script>


<template>
    <div class="d-flex vh-100">
        <div class="border w-50 m-auto p-3 rounded-5">
            <h2 class="text-center">E-mail cím megerősítés</h2>

            <div class="text-center">
                <h3>Megerősítő üzenetet küldtünk a megadott e-mail címre.</h3>
                <h4>Amennyiben nem kapta meg az üzenetet, vagy elveszett
                    <Link method="post" href="/email/resend-verification">ide kattintva</Link>
                     újra küldjük.</h4>
            </div>

        </div>
    </div>
</template>
