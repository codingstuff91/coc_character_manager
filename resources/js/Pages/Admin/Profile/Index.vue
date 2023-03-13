<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

defineProps({
    profiles: Array,
})
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des profils</h2>
        </template>

        <div class="p-4 mx-auto flex justify-center items-center">
            <button class="bg-blue-500 px-4 py-2 rounded-lg text-white">
                <Link href="/admin/profiles/create">
                    Nouveau profil
                </Link>
            </button>
        </div>

        <div class="max-w-xl mx-auto overflow-hidden rounded-lg">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 text-center font-medium text-gray-900">Name</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 border-t border-gray-100">
                <tr
                    class="hover:bg-gray-50"
                    v-for="profile in profiles" :key="profile.name"
                >
                    <td class="px-6 py-4 text-center">{{ profile.name }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-4">
                            <a x-data="{ tooltip: 'Edite' }" :href="`/admin/profiles/${profile.id}/edit`">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6"
                                    x-tooltip="tooltip"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                    />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>

