<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Chronicle from "@/Components/Chronicle.vue";

defineProps({
    chronicles: Array,
})
</script>

<template>
    <Head title="Chroniques" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chroniques</h2>
        </template>

        <div class="py-6 max-w-2xl mx-auto sm:w-full">
            <Chronicle
                class="mb-4"
                v-for="chronicle in chronicles"
                :key="chronicle.id"
                :chronicle="chronicle"
            />
        </div>

    </AuthenticatedLayout>
</template>
