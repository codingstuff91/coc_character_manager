<script setup>
    import PrimaryButton from "@/Components/PrimaryButton.vue";

    defineProps({
        chronicle: Object,
    })
</script>
<template>
    <div class="flex flex-col items-center rounded-lg py-4 px-8 bg-slate-400 w-full mx-auto drop-shadow-2xl">
        <h1 class="text-center text-white text-2xl font-extrabold my-4">{{ chronicle.name }}</h1>

        <p class="text-white text-lg">{{ chronicle.description }}</p>

        <primary-button class="mt-4">
            <a :href="`/chronicles/${chronicle.id}`">
                Selectionner
            </a>
        </primary-button>
    </div>
</template>
