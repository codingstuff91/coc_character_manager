<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    weapon: Object,
});

const form = useForm({
    name: props.weapon.name,
    dm_score: props.weapon.dm_score,
    attack_score: props.weapon.attack_score,
});

function submitForm () {
    router.put(`/admin/weapons/${props.weapon.id}`, form);
}
</script>


<template>
    <Head title="Edition - Armes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edition arme</h2>
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

                <InputLabel class="mt-4" value="Jet dégats"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.dm_score"
                />

                <InputLabel class="mt-4" value="Jet d'attaque"/>
                <TextInput
                    class="px-4 py-2"
                    v-model="form.attack_score"
                />

                <SecondaryButton type="submit" class="mt-4 px-4 py-2 bg-green-300 text-center">
                    Confirmer
                </SecondaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

