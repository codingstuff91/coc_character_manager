<script setup>
import Gauge from "@/Components/Gauge.vue";
defineProps({
    character: Object,
})
</script>

<template>
    <div class="mx-auto mt-4">
        <div class="card">
            <div class="card-header">Santé / Chance</div>
            <div class="columns-2 gap-2 flex justify-between mt-4">
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/heartbeat.png">
                        <h1>{{ character.attributes[13].name }}</h1>
                    </div>
                    <p>
                        {{ character.attributes[12].pivot.value }} /
                        {{ character.attributes[13].pivot.value }}
                    </p>
                </div>
                <div class="attribute">
                    <div class="attribute-header">
                        <img class="attribute-image" src="/img/clover.png">
                        <h1>{{ character.attributes[17].name }}</h1>
                    </div>
                    <p>
                        {{ character.attributes[17].pivot.value }} /
                        {{ character.attributes[18].pivot.value }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
