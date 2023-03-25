<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { calculateAttributeModificator } from "@/Composables/calculateAttributeModificator";
import { getFullImagePath } from "@/Composables/useImagePath";
import { useCharacterCreationStore } from "@/Stores/character-creation-store";
const store = useCharacterCreationStore();
const attributes = store.attributes;
const characterAttributes = store.characterAttributes;

const props = defineProps({
    errors: Object,
});

const setModificator = (attributeScore, attribute) => {
    let modificator = calculateAttributeModificator(attributeScore)
    characterAttributes[`${attribute}`].modificator = modificator;
    store.setCharacterAttributes(characterAttributes);
}
</script>

<template>
    <div>
        <h1 class="my-4 text-xl font-bold">Définition des attributs généraux</h1>
        <div class="grid grid-cols-3 gap-4 w-full">
            <div class="attribute">
                <img :src="getFullImagePath(attributes[0].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[0].name }}</h2>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.strength.score"
                            @blur="setModificator(characterAttributes.strength.score, 'strength')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.strength.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.strength" class="error-message">{{ errors.strength }}</p>
            </div>
            <div class="attribute">
                <img :src="getFullImagePath(attributes[1].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[1].name }}</h2>
                <p>{{ attributes[1].description }}</p>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.dexterity.score"
                            @blur="setModificator(characterAttributes.dexterity.score, 'dexterity')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.dexterity.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.dexterity" class="error-message">{{ errors.dexterity }}</p>
            </div>
            <div class="attribute">
                <img :src="getFullImagePath(attributes[2].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[2].name }}</h2>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.constitution.score"
                            @blur="setModificator(characterAttributes.constitution.score, 'constitution')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.constitution.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.constitution" class="error-message">{{ errors.constitution }}</p>
            </div>
            <div class="attribute">
                <img :src="getFullImagePath(attributes[3].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[3].name }}</h2>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.perception.score"
                            @blur="setModificator(characterAttributes.perception.score, 'perception')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.perception.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.perception" class="error-message">{{ errors.perception }}</p>
            </div>
            <div class="attribute">
                <img :src="getFullImagePath(attributes[4].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[4].name }}</h2>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.charisma.score"
                            @blur="setModificator(characterAttributes.charisma.score, 'charisma')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.charisma.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.charisma" class="error-message">{{ errors.charisma }}</p>
            </div>
            <div class="attribute">
                <img :src="getFullImagePath(attributes[5].image)" class="attribute-image">
                <h2 class="attribute-header">{{ attributes[5].name }}</h2>

                <div class="max-w-[180px] mx-auto grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel value="Score"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.intelligence.score"
                            @blur="setModificator(characterAttributes.intelligence.score, 'intelligence')"
                        />
                    </div>
                    <div>
                        <InputLabel value="Modificateur"/>
                        <TextInput
                            class="px-4 py-2 w-full text-center"
                            v-model="characterAttributes.intelligence.modificator"
                            disabled
                        />
                    </div>
                </div>
                <p v-if="errors.intelligence" class="error-message">{{ errors.intelligence }}</p>
            </div>
        </div>

    </div>
</template>


