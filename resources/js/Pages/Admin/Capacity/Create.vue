<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    characterWays: Array,
});

const form = reactive({
    name: null,
    level: null,
    description: null,
    characterWay: 0,
});

function submitForm () {
    router.post('/admin/capacities', form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création capacité</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Voie"/>
                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" v-model="form.characterWay">
                    <option
                        v-for="(way, index) in characterWays" key="index"
                        :value="way.id"
                    >
                        {{ way.name }}
                    </option>
                </select>

                <InputLabel class="mt-4" value="Nom"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.name"
                />

                <InputLabel class="mt-4" value="Niveau"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.level"
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

