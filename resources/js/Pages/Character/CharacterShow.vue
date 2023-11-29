<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CharacterSkills from "@/Pages/Character/CharacterSkills.vue";
import CharacterCombatSkills from "@/Pages/Character/CharacterCombatSkills.vue";
import CharacterWeapons from "@/Pages/Character/CharacterWeapons.vue";
import CharacterCapacities from "@/Pages/Character/CharacterCapacities.vue";
import CharacterLuckPoints from "@/Pages/Character/CharacterLuckPoints.vue";
import CharacterHealthPoints from "@/Pages/Character/CharacterHealthPoints.vue";
import AvatarPicture from "@/Components/AvatarPicture.vue";

defineProps({
    character: Object,
    capacities: Array,
});
</script>

<template>
    <Head :title="character.name" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex flex-col">
                <h2 class="font-bold text-lg text-gray-800 leading-tight mb-2 sm:text-2xl">{{ character.name }}</h2>
                <h2 class="font-bold text-lg text-gray-800 leading-tight mb-2 sm:text-2xl">Niveau {{ character.level }}</h2>
                <p><span class="font-bold text-lg">Famille :</span> {{ character.family.name }}</p>
                <p><span class="font-bold text-lg">{{ character.attributes[12].name }}</span> : {{ character.attributes[12].pivot.value}}</p>
            </div>
            <div class="flex flex-col">
                <AvatarPicture
                    :isEditable="character.is_editable"
                    :avatar="character.avatar"
                />
            </div>
        </template>

        <div class="mt-4 py-4 max-w-7xl xs:p-0 mx-auto sm:w-full bg-white">
            <CharacterSkills :character="character" />
            <CharacterHealthPoints :character="character" />
            <CharacterLuckPoints :character="character" />
            <CharacterCombatSkills :character="character" />
            <CharacterWeapons :character="character" v-if="character.weapons.length > 0" />
            <CharacterCapacities :character="character" :capacities="capacities" />
        </div>

    </AuthenticatedLayout>
</template>
