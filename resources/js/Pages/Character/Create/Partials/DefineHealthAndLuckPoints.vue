<script setup>
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
import InfoMessage from "@/Components/InfoMessage.vue";
const store = useCharacterCreationStore();
const attributes = store.attributes;
const lifeDiceScore = store.family.lifeDiceScore;
</script>

<template>
    <div>
        <h1 class="my-4 text-xl font-bold">Points de vie (PV) et points de chance (PC)</h1>
        <info-message>
            <p>Score PV = Dé vie de la famille choisie + mod constitution</p>
            <p>Score PC = Mod de charisme + 4 pour famille Aventure, sinon mod de charisme + 2</p>
        </info-message>

        <div class="grid grid-cols-3 gap-4 w-full">
            <div class="attribute">
                <img :src="attributes[12].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[12].name }}</h2>
                <div>
                    {{ lifeDiceScore }}
                </div>
            </div>
            <div class="attribute">
                <img :src="attributes[13].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[14].name }}</h2>
                <div v-if="attributes[14]">
                    {{ parseInt(store.characterAttributes.constitution.modificator) + parseInt(lifeDiceScore) }}
                </div>
            </div>
            <div class="attribute">
                <img :src="attributes[13].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[18].name }}</h2>
                <template v-if="store.family.id === 2">
                    {{ parseInt(store.characterAttributes.charisma.modificator) + 4 }}
                </template>
                <template v-else>
                    {{ parseInt(store.characterAttributes.charisma.modificator) + 2 }}
                </template>
            </div>
        </div>
    </div>
</template>
