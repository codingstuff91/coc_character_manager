<template>
    <button
        @click="resetGauge"
    >
        <img
            class="w-8 h-8 cursor:pointer"
            src="/img/eraser.png"
            alt="eraser"
        >
    </button>
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

    axios.post(`/character/${props.character}/attribute/${props.attribute}`, {
        newScore: newValue,
    }).then((response) => {
        console.log(response.data);
    }).catch(error => console.log(error));
}

const calculateRemainingPoints = (value) => {
    return parseInt(props.max - value);
}

const setGaugeValue = (value, max) => {
    selectedPoints.value = parseInt(value - 1);
    remainingPoints.value = calculateRemainingPoints(value);
}

const resetGauge = () => {
    selectedPoints.value = -1;
    setValue(-1);
}
</script>
