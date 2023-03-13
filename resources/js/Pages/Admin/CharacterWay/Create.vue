<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const form = reactive({
    name: null,
});

function submitForm () {
    router.post('/admin/character_ways', form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création d'une nouvelle voie</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Nom"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.name"
                />

                <button
                    type="submit"
                    class="mt-4 px-4 py-2 rounded-lg bg-green-300"
                >
                    Confirmer
                </button>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

