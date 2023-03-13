<script setup>
defineProps({
    character: Object,
})
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <h1 class="card-header">Armes</h1>
            <p class="px-2 text-xl">Nom / Attaque / Dégats</p>
            <div class="attribute">
                <div class="attribute-header">

                </div>
                <div class="flex w-full p-2 justify-between">
                    <p>{{ character.weapons[0].name }}</p>
                    <p>{{ character.weapons[0].dm_score }}</p>
                    <p>{{ character.weapons[0].attack_score }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
