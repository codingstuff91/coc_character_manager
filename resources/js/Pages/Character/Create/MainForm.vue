<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateFormStepOne from "@/Pages/Character/Create/CreateFormStepOne.vue";
import CreateFormStepTwo from "@/Pages/Character/Create/CreateFormStepTwo.vue";
import CreateFormStepThree from "@/Pages/Character/Create/CreateFormStepThree.vue";

import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import { onMounted } from "vue";
const store = useCharacterCreationStore();

const props = defineProps({
    families: Array,
    attributes: Array,
});

onMounted(()=> {
    store.setFamilies(props.families);
    store.setAttributes(props.attributes);
})
</script>

<template>

    <Head title="Attributs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Création de personnage</h2>
            <h3>Etape {{ store.formStep }}</h3>
        </template>

        <create-form-step-one
            v-if="store.formStep === 1"
            :families="families"
            :attributes="attributes"
        />

        <create-form-step-two
            v-if="store.formStep === 2"
        />

        <create-form-step-three
            v-if="store.formStep === 3"
        />
    </AuthenticatedLayout>

</template>
