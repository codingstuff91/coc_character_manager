<script setup>
import Gauge from "../../Components/Gauge.vue";
import attributesConstants from "@/Constants/AttributesConstants";

const props = defineProps({
    character: Object,
});
</script>

<template>
    <div class="card-header">Santé / Chance</div>
    <section class="mx-2">
        <div class="attribute">
            <div class="attribute-header">
                <img class="attribute-image" src="/img/heartbeat.png">
                <h1>{{ props.character.attributes[13].name }}</h1>
            </div>
            <Gauge
                :value="props.character.attributes[13].pivot.value"
                :max="props.character.attributes[14].pivot.value"
                :character="props.character.id"
                :attribute="attributesConstants.HEALTH_POINTS"
                icon="fa-solid fa-heart"
                color="text-red-500"
            />
        </div>
    </section>
</template>



