<script setup>
defineProps({
    character: Object,
})
</script>
<template>
    <div class="rounded-lg p-4 bg-slate-400 w-[90%] mx-auto drop-shadow-2xl">
        <div class="flex justify-center items-center w-[80%] mx-auto">
            <img v-if="character.gender == 'M'" src="/img/directeur.png"  class="mr-4" width="55">
            <img v-else src="/img/femme.png" class="mr-4" width="55">
            <h1 class="text-white text-xl font-bold">{{ character.name }}</h1>
        </div>
        <div class="flex justify-center">
            <button class="mt-4 p-2 rounded-lg w-[70%] bg-white font-bold text-lg drop-shadow-lg">
                <a :href="route('characters.show', character.id)">Consulter</a>
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
