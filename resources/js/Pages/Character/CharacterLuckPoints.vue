<script setup>
import Gauge from "../../Components/Gauge.vue";
import attributesConstants from "@/Constants/AttributesConstants";

const props = defineProps({
    character: Object,
});
</script>

<template>
    <section class="mx-2 mt-4">
        <div class="attribute">
            <div class="attribute-header">
                <img class="attribute-image" src="/img/clover.png">
                <h1>{{ props.character.attributes[17].name }}</h1>
            </div>
            <Gauge
                :value="3"
                :max="5"
                :character="props.character.id"
                :attribute="attributesConstants.LUCK_POINTS"
                icon="fa-solid fa-clover"
                color="text-green-700"
            />
        </div>
    </section>
</template>



