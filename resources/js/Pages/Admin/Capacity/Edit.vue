<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    capacity: Object,
});

const form = useForm({
    name: props.capacity.name,
    level: props.capacity.level,
    description: props.capacity.description,
});

function submitForm () {
    router.put(`/admin/capacities/${props.capacity.id}`, form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edition capacité</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel value="Nom"/>
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
                    class="rounded-lg px-4 py-2 border border-gray-100"
                    rows="5"
                    v-model="form.description"
                >
                </textarea>

                <SecondaryButton type="submit" class="mt-4 px-4 py-2 bg-green-300 text-center">
                    Confirmer
                </SecondaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

