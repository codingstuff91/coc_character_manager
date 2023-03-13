<template>
    <div class="w-full mt-4 ml-2 p-4 bg-blue-100 rounded-lg flex items-center">
        <img src="/img/info.png" class="w-8 h-8 mr-4">
        <p class="text-justify text-lg">
            <slot></slot>
        </p>
    </div>
</template>

<script>
export default {
  name: "InfoMessage"
}
</script>
