<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive, onMounted } from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InfoMessage from "@/Components/InfoMessage.vue";

const props = defineProps({
    healthPoints: Number,
    character: Object,
});

const form = reactive({
    healthPoints: null,
    character_id: null,
});

onMounted(() => {
    form.healthPoints = props.healthPoints;
    form.character_id = props.character.id;
});

function submitForm () {
    router.put('/level-up/confirm_health', form);
}
</script>


<template>
    <Head title="Amélioration des PV" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Amélioration PV du personnage</h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Niveau {{ character.level - 1 }} --> {{ character.level }}</h2>
        </template>

        <div class="p-6 mx-auto">
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <InputLabel class="mt-4" value="Nombre PV supplémentaires"/>

                <TextInput
                    v-model="form.healthPoints"
                    type="text"
                    class="mt-1 block w-full"
                    disabled
                    required
                />

                <info-message>
                    Si Niveau est pair, c'est le résultat du Dé de Vie qui compte.
                </info-message>

                <info-message>
                    Si Niveau est impair, on prend le modificateur de Constitution.
                </info-message>

                <info-message>
                    En cas de modif de Constitution négatif le modif est retranché au résultat de Dé de Vie...
                </info-message>

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

