<script setup>
import { reactive, watch } from "vue";
import InfoMessage from "@/Components/InfoMessage.vue";

import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import InputLabel from "@/Components/InputLabel.vue";
const store = useCharacterCreationStore();

const props = defineProps({
    errors: Object,
});

const form = reactive({
    advantage: {
        id: '',
        name: '',
        description: ''
    },
});

watch(() => form.advantage.id, (advantage) => {
    const advantageToDisplay = store.advantages.find(element => {
        return element.id === advantage;
    });

    form.advantage.name = advantageToDisplay.name;
    form.advantage.description = advantageToDisplay.description;

    store.setAdvantage(form.advantage.id);
});


</script>

<template>
    <div class="mt-4">
        <h2 class="text-xl font-bold">Choix du trait</h2>
        <info-message>
            Correspond au trait principal du personnage lui accordant un avantage particulier
        </info-message>
        <div class="flex flex-col w-full">
            <div class="w-2/4 mx-auto">
                <InputLabel class="mt-4" value="Traits disponibles"/>
                <select v-model="form.advantage.id" class="rounded-lg w-full">
                    <option v-for="advantage in store.advantages"
                            :key="advantage.name"
                            :value="advantage.id">
                        {{ advantage.name }}
                    </option>
                </select>
                <p class="error-message" v-if="errors.advantage">{{ errors.advantage }}</p>
            </div>
            <info-message v-if="form.advantage.description != ''">
                {{ form.advantage.description }}
            </info-message>
        </div>
    </div>
</template>
