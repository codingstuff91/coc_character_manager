<script setup>
defineProps(['modelValue', 'values']);

defineEmits(['update:modelValue']);
</script>

<template>
    <select
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
        @input="$emit('update:modelValue', $event.target.value)"
        :value="modelValue"
    >
        <option
            v-for="(value, index) in values" :key="index"
        >
            {{ value }}
        </option>
    </select>
</template>
