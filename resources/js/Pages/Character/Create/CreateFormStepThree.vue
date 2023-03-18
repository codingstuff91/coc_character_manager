<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import DefineProfile from "@/Pages/Character/Create/Partials/DefineProfile.vue";
import DefineCapacities from "@/Pages/Character/Create/Partials/DefineCapacities.vue";
import { reactive } from "vue";

const store = useCharacterCreationStore();
const character = store.informations;

const props = defineProps({
    families: Array,
    attributes: Array,
});

const errors = reactive({});

const validateForm = () => {
    for (const [key, value] of Object.entries(errors)) {
        errors[key] = null;
    }

    if (store.capacities.length === 0) {
        errors.capacities = "Veuillez définir les capacités";
    }

    if(!errors.capacities) {
        axios.post(route('character.store'), {
            character: store,
        });
    }
}

</script>

<template>
    <div class="px-12 py-6 mx-auto">
        <define-profile />

        <define-capacities :errors="errors"/>

        <button class="footer-success-button" @click="validateForm">
            Confirmer la création
        </button>
    </div>
</template>
