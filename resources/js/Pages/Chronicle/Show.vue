<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Character from "@/Components/Character.vue";

defineProps({
    characters: Array,
})
</script>

<template>
    <Head title="Personnages" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Personnages</h2>
        </template>

        <div class="py-6 px-4 max-w-2xl mx-auto sm:w-full">
            <Character
                class="mb-4"
                v-for="character in characters"
                :key="character.id"
                :character="character"
            />
        </div>

    </AuthenticatedLayout>
</template>
