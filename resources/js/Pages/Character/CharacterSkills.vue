<template>
    <div class="mx-auto">
        <div class="card">
            <h1 class="card-header">Caractéristiques</h1>
            <h2 class="px-2 text-xl">(Valeur / Modificateur)</h2>
            <div class="columns-2 gap-2 flex justify-between mt-4">
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/strength.png">
                        <p>{{ character.attributes[0].name }}</p>
                    </div>
                    <p class="mt-2">{{ character.attributes[0].pivot.value }} / {{ formatModificator(character.attributes[0].pivot.modificator) }}</p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/dexterity.png">
                        <p>{{ character.attributes[1].name }}</p>
                    </div>
                    <p>{{ character.attributes[1].pivot.value }} / {{ formatModificator(character.attributes[1].pivot.modificator) }}</p>
                </div>
            </div>
            <div class="columns-2 gap-2 flex justify-between">
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/constitution.png" alt="">
                        <p>{{ character.attributes[2].name }}</p>
                    </div>

                    <p>{{ character.attributes[2].pivot.value }} / {{ formatModificator(character.attributes[2].pivot.modificator) }}</p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/perception.png">
                        <p>{{ character.attributes[3].name }}</p>
                    </div>

                    <p>{{ character.attributes[3].pivot.value }} / {{ formatModificator(character.attributes[3].pivot.modificator) }}</p>
                </div>
            </div>
            <div class="columns-2 gap-2 flex justify-between">
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/charisma.png">
                        <p>{{ character.attributes[4].name }}</p>
                    </div>

                    <p>{{ character.attributes[4].pivot.value }} / {{ formatModificator(character.attributes[4].pivot.modificator) }}</p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/intelligence.png">
                        <p>{{ character.attributes[5].name }}</p>

                    </div>
                    <p>
                        {{ character.attributes[5].pivot.value }}
                        / {{ formatModificator(character.attributes[5].pivot.modificator) }}
                    </p>
                </div>
            </div>
            <div class="card">
                <h1 class="card-header">Trait : {{ character.advantage.name }}</h1>
                <div class="mt-4 p-2 text-justify text-lg bg-gray-200 rounded-md">
                    <p>{{ character.advantage.description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    character: Object,
})
const formatModificator = (value) => {
    return value > 0 ? `+${value}` : value;
}
</script>
