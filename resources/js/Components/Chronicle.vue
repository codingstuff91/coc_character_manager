<script setup>
    import SecondaryButton from "@/Components/SecondaryButton.vue";

    defineProps({
        chronicle: Object,
    })
</script>
<template>
    <div class="flex flex-col items-center rounded-lg py-4 px-8 bg-slate-400 w-full mx-auto drop-shadow-2xl">
        <h1 class="text-center text-white text-2xl font-bold my-4">{{ chronicle.name }}</h1>

        <p class="text-white text-xl font-bold">{{ chronicle.description }}</p>

        <secondary-button class="mt-4">
            <a :href="`/chronicle/${chronicle.id}`">
                Selectionner
            </a>
        </secondary-button>
    </div>
</template>
