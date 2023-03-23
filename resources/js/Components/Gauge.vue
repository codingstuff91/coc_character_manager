<template>
    <div class="flex justify-center mt-4 flex-wrap">
        <div v-for="(item, index) in max" :key="index">
            <template v-if="index <= selectedPoints">
                <i :class="`mx-2 text-4xl ${icon} ${color}`" @click="setValue(index)"></i>
            </template>
            <template v-else>
                <i :class="`mx-2 text-4xl ${icon} text-gray-400`" @click="setValue(index)"></i>
            </template>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

let remainingPoints = ref(0);
let selectedPoints = ref(0);

onMounted(() => {
    setGaugeValue(props.value, props.max);
});

const props = defineProps({
    value: Number,
    max: Number,
    attribute: Number,
    character: Number,
    icon: String,
    color: {
        type: String,
        default: 'text-gray-400',
    },
});
const setValue = (index) => {
    remainingPoints.value = calculateRemainingPoints(index);
    selectedPoints.value = index;

    let newValue = parseInt(index + 1);

    axios.patch(route('character.update_attribute', [props.character, props.attribute]), {
        newScore: newValue,
    }).then((response) => {
        console.log(response.data);
    });
}

const calculateRemainingPoints = (value) => {
    return parseInt(props.max - value);
}

const setGaugeValue = (value, max) => {
    selectedPoints.value = parseInt(value - 1);
    remainingPoints.value = calculateRemainingPoints(value);
}
</script>
