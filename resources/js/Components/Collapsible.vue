<script setup>
import { ref } from "vue";
const open = ref(false);
const props = defineProps({
    title: String,
});
function toggle() {
    open.value = !open.value;
}
</script>

<template>
    <div class="my-4 border-2 border-gray-300 rounded-xl">
        <div class="cursor-pointer p-2 bg-gray-200 flex gap-8 px-4 justify-between" @click="toggle">
            <h3 class="text-xl font-bold">
                {{ title }}
            </h3>
            <span v-if="open">▲</span>
            <span v-else>▼</span>
        </div>
        <div v-show="open" class="p-4">
            <slot />
        </div>
    </div>
</template>
