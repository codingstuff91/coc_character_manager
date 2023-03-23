<script setup>
defineProps({
    character: Object,
    capacities: Array,
})
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <h1 class="card-header">Capacités</h1>
            <div class="capacity mt-4" v-for="capacity in capacities" :key="capacity.id">
                <h2 class="font-bold text-center text-xl">{{ capacity[0].character_way.name }}</h2>
                <div v-for="level in capacity" :key="level.name" class="mt-4">
                    <p class="font-bold mb-2">Niv {{ level.level }} - {{ level.name}}</p>
                    <p class="text-justify">{{ level.description }}</p>
                </div>

            </div>
        </div>
    </div>
</template>
