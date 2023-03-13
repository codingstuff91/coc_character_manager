<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import InfoMessage from "@/Components/InfoMessage.vue";
import {ref, watch} from "vue";

const props = defineProps({
    errors: Object,
});

const store = useCharacterCreationStore();
let levelsChosen = ref([]);

watch(() => levelsChosen.value, (levelsChosen) => {
    store.setCapacities(levelsChosen.value)
});
</script>

<template>
    <div v-if="store.profile.id != 0">
        <section class="mt-4">
            <h2 class="text-xl font-bold">Choix des capacités des voies disponibles</h2>
            <info-message>
                <p>Pour les PJ des familles Action et Aventure, le joueur a droit à 2 points de capacités maximum, lui permettant d'acceder à 2 capacités de niveau 1 parmi les 3 voies disponibles pour le profil choisi</p>
            </info-message>
            <info-message>
                <p>Pour les PJ de la famille Réflexion, le joueur à droit à 4 points de capacités, lui permettant d'accéder à 2 capacités de niveau 2 ou alors 1 capacité de niveau 2 et 2 capacités de niveau 1 parmi les 3 voies disponibles</p>
            </info-message>
            <div class="w-full">
                <p v-if="errors.capacities" class="error-message">{{ errors.capacities }}</p>

                <div class="bg-white p-6 my-4 rounded-xl" v-for="way in store.characterWays" :key="way.name">
                    <h3 class="text-2xl font-bold text-center mb-4">{{ way.name }}</h3>
                    <p class="my-2 text-justify"  v-for="capacity in way.capacities" :key="capacity.id">
                        <input type="checkbox" v-model="levelsChosen" :value="capacity.id" class="mr-4">
                        <span class="font-bold">Niveau {{ capacity.level }} :</span> {{ capacity.description }}
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>
