<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import InputLabel from "@/Components/InputLabel.vue";
import { reactive } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    characters: Array,
    users: Array
});

const form = reactive({
    characterId: null,
    userId: null,
});

function submitForm () {
    router.post(`/character/associate/${form.characterId}/user/${form.userId}`, form);
}
</script>


<template>
    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Association personnage</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Personnage"/>
                <select v-model="form.characterId" class="rounded-lg">
                    <option v-for="character in characters" :key="character.name" :value="character.id">
                        {{ character.name }}
                    </option>
                </select>

                <InputLabel class="mt-4" value="Joueur"/>
                <select v-model="form.userId" class="rounded-lg">
                    <option v-for="user in users" :key="user.name" :value="user.id">
                        {{ user.name }}
                    </option>
                </select>

                <SecondaryButton type="submit" class="mt-4 px-4 py-2 bg-green-300 text-center">
                    Confirmer
                </SecondaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

