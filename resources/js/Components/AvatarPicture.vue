<template>
    <h1>Avatar picture</h1>
    <img
        src="https://picsum.photos/150"
        class="rounded-xl border-2 border-gray-700 hover:border-2 hover:opacity-50"
        @click="test"
    >
    <Modal
        :show="displayModal"
        :closeable="true"
        @close="closeModal"
    >
        <div class="flex flex-col items-center">
            <h1 class="pt-4 text-center text-xl font-bold">Choisissez un nouvel avatar</h1>

            <input
                type="file"
                ref="fileInput"
                @change="handleFileChange"
                class="my-4"
            />

            <button
                @click="uploadFile"
                class="mt-4 bg-green-300 px-4 py-2 rounded-lg mb-4"
            >
                Uploader
            </button>
        </div>
    </Modal>
</template>

<script setup>
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

let displayModal = ref(false);

const test = () => {
    displayModal.value = !displayModal.value;
}

const uploadFile = () => {
    alert('test upload')
}

const closeModal = () => {
    displayModal.value = false
}
</script>
