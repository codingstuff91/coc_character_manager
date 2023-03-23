<script setup>
import weaponsConstants from "@/Constants/WeaponsConstants";
const props = defineProps({
    character: Object,
})
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <h1 class="card-header">Armes</h1>
            <div class="attribute" v-for="weapon in props.character.weapons" :key="weapon.id">
                <div class="flex w-full p-2 justify-between">
                    <div>
                        <h3 class="font-bold">Nom</h3>
                        <p>{{ weapon.name }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold">Dégats</h3>
                        <p>
                            {{ weapon.damage_score }}
                            <span v-if="weapon.category === weaponsConstants.CONTACT">
                                / {{ props.character.attributes[0].pivot.modificator }}
                            </span>
                        </p>
                    </div>
                    <div v-if="weapon.category === weaponsConstants.DISTANCE">
                        <h3 class="font-bold">Portée</h3>
                        <p>{{ weapon.range }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
