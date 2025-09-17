<script setup>
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = page.props.auth.user

defineProps({
    character: Object,
})
</script>
<template>
    <div class="rounded-lg p-4 bg-slate-400 w-[60%] mx-auto drop-shadow-2xl">
        <div class="flex justify-center items-center w-[80%] mx-auto">
            <img
                v-if="character.gender === 'M'"
                src="/img/directeur.png"
                class="mr-4 w-24"
                alt="male_emoji"
            >
            <img
                v-else
                src="/img/femme.png"
                class="mr-4 w-24"
                alt="male_emoji"
            >

            <h1 class="text-white text-2xl font-extrabold">
                {{ character.name }}
            </h1>
            <a :href="`/level-up/${character.id}/improvement`">
                <img
                    v-show="! character.can_level_up && user.admin"
                    src="/img/improve.png"
                    class="w-12 h-12"
                    alt="level-up"
                />
            </a>
        </div>
        <div class="flex justify-center">
            <button class="mt-4 p-2 rounded-lg w-full bg-white font-bold text-lg drop-shadow-lg">
                <a :href="route('characters.show', character.id)">Consulter</a>
            </button>
        </div>
    </div>
</template>

<style scoped>

</style>
