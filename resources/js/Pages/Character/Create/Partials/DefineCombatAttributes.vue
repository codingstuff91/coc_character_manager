<script setup>
import InfoMessage from "@/Components/InfoMessage.vue";

import { useCharacterCreationStore } from "@/Stores/character-creation-store";
const store = useCharacterCreationStore();
const attributes = store.attributes;
const characterAttributes = store.characterAttributes;
</script>

<template>
    <div>
        <h1 class="my-4 text-xl font-bold">Attributs combat</h1>
        <info-message>
            <p>Initiative = Score Dextérité</p>
            <p>ATC (Attaque contact) = Mod de Force</p>
            <p>ATD (Attaque distance) = Mod de Dextérité</p>
            <p>ATM (Attaque maqique ou mentale) = Mod d'Intelligence</p>
        </info-message>

        <div class="grid grid-cols-4 gap-4 w-full">
            <div class="attribute">
                <img :src="attributes[6].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[6].name }}</h2>
                <div>
                    {{ characterAttributes.dexterity.score }}
                </div>
            </div>
            <div class="attribute">
                <img :src="attributes[9].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[9].name }}</h2>
                <div>
                    {{ characterAttributes.strength.modificator }}
                </div>
            </div>
            <div class="attribute">
                <img :src="attributes[11].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[10].name }}</h2>
                <div>
                    {{ characterAttributes.dexterity.modificator }}
                </div>
            </div>
            <div class="attribute">
                <img :src="attributes[6].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[11].name }}</h2>
                <div>
                    {{ characterAttributes.intelligence.modificator }}
                </div>
            </div>
        </div>

        <h1 class="my-4 text-xl font-bold">Défense</h1>
        <div class="grid grid-cols-2 gap-8">
            <info-message>
                <p>Défense = 10 + Modif de Dextérité</p>
                <p>Des bonus supplémentaires peuvent être ajoutés grâce à des équipements</p>
                <p>(ex : Gilet pare-balles)</p>
            </info-message>
            <div class="attribute">
                <img :src="attributes[7].image" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[7].name }}</h2>
                <div>
                    {{ parseInt(10) + parseInt(characterAttributes.dexterity.modificator) }}
                </div>
            </div>
        </div>

    </div>
</template>
