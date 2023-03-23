<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import SelectList from "@/Components/Select.vue";

const form = reactive({
    name: null,
    category: null,
    damage_score: null,
    range: 0,
});

function submitForm () {
    router.post('/admin/weapons', form);
}
</script>


<template>
    <Head title="Armes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création nouvelle arme</h2>
        </template>

        <div class="p-6 mx-auto max-w-[450px]">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Nom"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.name"
                />

                <InputLabel class="mt-4" value="Catégorie"/>
                <SelectList
                    :values="['contact', 'distance']"
                    v-model="form.category"
                />

                <InputLabel class="mt-4" value="Jet dégats"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.damage_score"
                />

                <InputLabel class="mt-4" value="Portée"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.range"
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

