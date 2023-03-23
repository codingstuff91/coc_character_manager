<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import SelectList from "@/Components/Select.vue";

const props = defineProps({
    weapon: Object,
    characters: Array,
});

const form = useForm({
    characterId: null
});

function submitForm () {
    router.post(`/admin/weapons/${props.weapon.id}/give/${form.characterId}`);
}
</script>


<template>
    <Head title="Attribution arme" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edition arme</h2>
        </template>

        <div class="p-6 mx-auto max-w-[450px]">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Personnage"/>
                <select v-model="form.characterId">
                    <option v-for="character in props.characters" :value="character.id">{{ character.name }}</option>
                </select>

                <SecondaryButton type="submit" class="mt-4 px-4 py-2 bg-green-300 text-center">
                    Confirmer
                </SecondaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>

