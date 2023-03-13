<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
const store = useCharacterCreationStore();

const goToNextFormStep = () => {
    store.goToNextStep();
}

const goToPreviousFormStep = () => {
    store.goToPreviousStep();
}
</script>

<template>
    <div class="mt-4 mx-auto flex justify-center max-w-[500px]">
        <button
            class="footer-button"
            v-if="store.formStep > 1"
            @click="goToPreviousFormStep"
        >
            Etape précédente
        </button>
        <button
            class="footer-button"
            @click="goToNextFormStep"
            v-if="store.formStep !== 3"
        >
            Etape suivante
        </button>
        <button
            class="footer-success-button"
            @click="goToNextFormStep"
            v-if="store.formStep === 3"
        >
            Valider le personnage
        </button>
    </div>
</template>
