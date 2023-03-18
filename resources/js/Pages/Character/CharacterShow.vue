<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CharacterSkills from "@/Pages/Character/CharacterSkills.vue";
import CharacterVitality from "@/Pages/Character/CharacterVitality.vue";
import CharacterCombatSkills from "@/Pages/Character/CharacterCombatSkills.vue";
import CharacterWeapons from "@/Pages/Character/CharacterWeapons.vue";
import CharacterCapacities from "@/Pages/Character/CharacterCapacities.vue";

defineProps({
    character: Object,
    capacities: Array,
})
</script>

<template>
    <Head :title="character.name" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col">
                <h2 class="font-bold text-2xl text-gray-800 leading-tight mb-2">{{ character.name }}</h2>
                <p><span class="font-bold text-lg">Famille :</span> {{ character.family.name }}</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-2xl text-gray-800 leading-tight mb-2">Niveau {{ character.level }}</h2>
                <p> {{ character.attributes[12].name }} : {{ character.attributes[12].pivot.value}}</p>
            </div>
        </template>

        <div class="mt-4 py-4 max-w-7xl xs:p-0 mx-auto sm:w-full bg-white">
            <CharacterSkills :character="character" />
            <CharacterVitality :character="character" />
            <CharacterCombatSkills :character="character" />
            <CharacterWeapons :character="character" v-if="character.weapons.length >0" />
            <CharacterCapacities :character="character" :capacities="capacities" />
        </div>

    </AuthenticatedLayout>
</template>
