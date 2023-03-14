<script setup>
    defineProps({
        character: Object,
    })

    const formatModificator = (value) => {
        return value > 0 ? `+${value}` : value;
    }

    const totalDefense = (defense, bonus) => {
        console.log([defense,bonus]);
        return parseInt(10) + parseInt(defense) + parseInt(bonus);
    }
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <h1 class="card-header">Combat</h1>
            <div class="columns-2 gap-2 flex justify-between mt-4">
                <div class="attribute">
                    <div class="attribute-header">
                        <img src="/img/initiative.png" class="attribute-image">
                        <p>{{ character.attributes[6].name }}</p>
                    </div>
                    <p>{{ character.attributes[6].pivot.value }}</p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img src="/img/contact_attack.png" class="attribute-image">
                        <p>{{ character.attributes[9].name }}</p>
                    </div>
                    <p>{{ formatModificator(character.attributes[1].pivot.modificator) }}</p>
                </div>
            </div>
            <div class="columns-2 gap-2 flex justify-between">
                <div class="attribute">
                    <div class="attribute-header">
                        <img src="/img/distant_attack.png" class="attribute-image">
                        <p>{{ character.attributes[10].name }}</p>
                    </div>
                    <p>{{ formatModificator(character.attributes[2].pivot.modificator) }}</p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img src="/img/magic.png" class="attribute-image">
                        <p>{{ character.attributes[11].name }}</p>
                    </div>
                    <p>{{ formatModificator(character.attributes[3].pivot.modificator) }}</p>
                </div>
            </div>
            <div class="attribute">
                <div class="attribute-header">
                    <img src="/img/fiabilite.png" class="attribute-image">
                    <h2>Defense</h2>
                </div>
                <div class="flex justify-around w-full mt-2">
                    <div class="flex flex-col items-center">
                        <p class="font-bold text-sm">Base</p>
                        <p>{{ parseInt(10) + parseInt(character.attributes[1].pivot.modificator) }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="font-bold text-sm">Armure</p>
                        <p>{{ parseInt(character.attributes[8].pivot.modificator) }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="font-bold text-sm">Total</p>
                        <p>{{ totalDefense(character.attributes[1].pivot.modificator, character.attributes[8].pivot.modificator) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
