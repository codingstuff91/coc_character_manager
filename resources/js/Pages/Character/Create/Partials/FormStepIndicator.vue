<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
const store = useCharacterCreationStore();

const changeFormStep = (step) => {
    store.setFormStep(step);
}
</script>

<template>
    <div class="mx-auto max-w-3xl">
        <h1 class="text-center">Etapes création personnage</h1>
        <section class="mt-4 flex justify-around">
            <a href="#"
               v-for="(step, index) in store.formsteps" :key="index"
               class="rounded-full p-2 border-2 border-green-500 bg-green-200"
               @click="changeFormStep(step)"
            >
                {{ step }}
            </a>
        </section>
    </div>
</template>


