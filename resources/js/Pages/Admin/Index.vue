<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Character from "@/Components/Character.vue";
import NavLink from "@/Components/NavLink.vue";
import { Link } from '@inertiajs/vue3'

defineProps({
    characters: Array,
})
</script>

<template>
    <Head title="Personnages" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h2>
        </template>

        <div class="py-6 mx-auto">
            <h1 class="my-4 pl-4 font-bold text-xl">Gestion des Personnages</h1>

            <div class="grid grid-cols-4 gap-4 px-6 sm:columns-4 sm:p-4">
                <div class="bg-white p-4 h-22 mt-4 rounded-lg flex flex-col items-center">
                    <Link class="w-full flex flex-col items-center" href="/character/associate">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Attribuer un personnage</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 mt-4 rounded-lg flex flex-col items-center">
                    <Link class="w-full flex flex-col items-center" :href="route('character.create')">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Créer un personnage</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 mt-4 rounded-lg flex flex-col items-center">
                    <img src="/img/wizard.png" class="w-9 h-8">
                    <h2 class="text-center">Editer un personnage</h2>
                </div>
            </div>

            <h1 class="mt-4 px-4 font-bold text-xl">Gestion application</h1>
            <div class="gird grid-cols-6 gap-4 px-6 sm:grid sm:grid-cols-4 sm:p-4">
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/attributes">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Attributs</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/capacities">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Capacités</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/advantages">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Traits</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/profiles">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Profils</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/character_ways">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Voies</h2>
                    </Link>
                </div>
                <div class="bg-white p-4 h-22 rounded-lg">
                    <Link class="w-full flex flex-col items-center" href="/admin/weapons">
                        <img src="/img/wizard.png" class="w-9 h-8">
                        <h2 class="text-center">Armes</h2>
                    </Link>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
