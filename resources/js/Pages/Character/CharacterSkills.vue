<template>
    <div class="mx-auto">
        <div class="card">
            <h1 class="card-header">Caractéristiques</h1>
            <h2 class="px-2 text-xl">(Valeur / Modificateur)</h2>
            <div class="grid grid-cols-2 gap-2 mx-2 sm:grid-cols-3 lg:grid-cols-6">
                <div class="attribute" v-for="attribute in mainAttributes" :key="attribute.id">
                    <div class="attribute-header">
                        <img class="attribute-image" :src="getImageFullPathName(attribute.image)">
                        <p>{{ attribute.name }}</p>
                    </div>
                    <p class="mt-2">{{ attribute.pivot.value }} / {{ formatModificator(attribute.pivot.modificator) }}</p>
                </div>
            </div>
            <div class="attribute">
                <h1 class="card-header">Trait principal : {{ character.advantage.name }}</h1>
                <div class="mt-2 p-4 text-justify text-lg bg-gray-200 rounded-md">
                    <p v-html="character.advantage.description "></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import AttributesConstants from "@/Constants/AttributesConstants";
import { computed } from "vue";

const images_path = AttributesConstants.IMAGES_PATH;

const props = defineProps({
    character: Object,
});

const mainAttributes = computed(() => {
    return props.character.attributes.slice(0, 6);
});

const getImageFullPathName = (attribute_image) => {
    return images_path + attribute_image
}
const formatModificator = (value) => {
    return value > 0 ? `+${value}` : value;
}
</script>
