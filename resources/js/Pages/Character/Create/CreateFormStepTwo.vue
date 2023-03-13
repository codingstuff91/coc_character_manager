<script setup>
import DefineMainAttributes from "@/Pages/Character/Create/Partials/DefineMainAttributes.vue";
import DefineHealthAndLuckPoints from "@/Pages/Character/Create/Partials/DefineHealthAndLuckPoints.vue";
import DefineCombatAttributes from "@/Pages/Character/Create/Partials/DefineCombatAttributes.vue";
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import { reactive } from "vue";

const store = useCharacterCreationStore();
const errors = reactive({});

const goPreviousStep = () => {
    store.goToPreviousStep();
}

const validateForm = () => {
    for (const [key, value] of Object.entries(errors)) {
        errors[key] = null;
    }

    // if (store.characterAttributes.strength.score === 0) {
    //     errors.strength = "Veuillez définir la force";
    // }
    //
    // if (store.characterAttributes.dexterity.score === 0) {
    //     errors.dexterity = "Veuillez définir la dexterité";
    // }
    //
    // if (store.characterAttributes.constitution.score === 0) {
    //     errors.constitution = "Veuillez définir la constitution";
    // }
    //
    // if (store.characterAttributes.perception.score === 0) {
    //     errors.perception = "Veuillez définir la perception";
    // }
    //
    // if (store.characterAttributes.charisma.score === 0) {
    //     errors.charisma = "Veuillez définir le charisme";
    // }
    //
    // if (store.characterAttributes.intelligence.score === 0) {
    //     errors.intelligence = "Veuillez définir l'intelligence";
    // }
    //
    // if(!errors.strength && !errors.dexterity && !errors.constitution && !errors.perception && !errors.charisma && !errors.intelligence) {
    //     store.goToNextStep();
    // }

    store.goToNextStep();
}
</script>

<template>
    <div class="px-12 py-6 mx-auto">
        <define-main-attributes :errors="errors"/>

        <define-health-and-luck-points/>

        <define-combat-attributes/>
    </div>

    <button
        class="footer-button"
        v-if="store.formStep > 1"
        @click="goPreviousStep"
    >
        Etape précédente
    </button>

    <button class="footer-button" @click="validateForm">
        Etape suivante
    </button>
</template>
