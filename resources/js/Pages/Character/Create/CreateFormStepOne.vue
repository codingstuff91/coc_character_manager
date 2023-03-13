<script setup>
import GeneralInformations from "@/Pages/Character/Create/Partials/GeneralInformations.vue";
import DefineAdvantage from "@/Pages/Character/Create/Partials/DefineAdvantage.vue";
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import { reactive } from "vue";
const store = useCharacterCreationStore();

const props = defineProps({
    families: Array,
    attributes: Array,
});

let errors = reactive({})

const validateForm = () => {
    for (const [key, value] of Object.entries(errors)) {
        errors[key] = null;
    }

    // if (store.family.id === 0) {
    //     errors.family = "Veuillez choisir une famille";
    // }
    //
    // if (store.informations.name === '') {
    //     errors.name = "Veuillez choisir un nom";
    // }
    //
    // if (store.informations.age === 0) {
    //     errors.age = "Veuillez définir un age";
    // }
    //
    // if (store.informations.gender === '') {
    //     errors.gender = "Veuillez définir un sexe au personnage";
    // }
    //
    // if (store.informations.height === 0) {
    //     errors.height = "Veuillez choisir une taille";
    // }
    //
    // if (store.advantage === 0) {
    //     errors.advantage = "Veuillez choisir un trait";
    // }
    //
    // if(!errors.family && !errors.name && !errors.age && !errors.gender && !errors.height && !errors.advantage) {
    //     store.goToNextStep();
    // }

    store.goToNextStep();
}

</script>

<template>
    <div class="px-12 py-6 mx-auto">
        <general-informations :families="families" :errors="errors"/>

        <define-advantage :errors="errors"/>

        <button class="footer-button" @click="validateForm">
            Etape suivante
        </button>
    </div>
</template>
