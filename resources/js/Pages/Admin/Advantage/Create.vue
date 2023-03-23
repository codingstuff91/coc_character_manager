<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const form = reactive({
    name: null,
    description: null,
    family_id: null,
});

const props = defineProps({
    families: Array,
});

function submitForm () {
    router.post('/admin/advantages', form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création trait / avantage</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Famille"/>
                <select v-model="form.family_id">
                    <option  v-for="family in props.families" :key="family.id" :value="family.id">{{ family.name }}</option>
                </select>

                <InputLabel class="mt-4" value="Nom"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.name"
                />

                <InputLabel class="mt-4" value="Description"/>
                <textarea
                    class="rounded-lg border-gray-100"
                    v-model="form.description"
                    rows="5"
                >
                </textarea>

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

