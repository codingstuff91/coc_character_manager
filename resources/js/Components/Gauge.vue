<template>
    <div class="flex justify-center">
        <div v-for="(item,index) in max" :key="index">
<!--            <img-->
<!--                class="w-10 h-10" :src="icon"-->
<!--                @click.prevent="confirmValue(item)"-->
<!--            >-->
            <i class="mx-2 text-4xl fa-solid fa-clover"></i>
        </div>
    </div>
</template>

<script setup>
defineProps({
    value: Number,
    max: Number,
});
const confirmValue = (index) => {
    console.log('confirm click', index);
}
</script>
