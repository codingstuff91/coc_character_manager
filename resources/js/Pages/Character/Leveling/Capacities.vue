<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

import { reactive, onMounted, computed } from "vue";
import InfoMessage from "@/Components/InfoMessage.vue";
import Collapsible from "@/Components/Collapsible.vue";

const props = defineProps({
    character: Object,
    ownedWays: Object,
    remainingWays: Object,
    knownCapacities: Array,
});

const form = reactive({
    capacities: [],
});

const isUnknownCapacity = computed(() => {
    return (capacityId) => ! props.knownCapacities.includes(capacityId);
});

function addCapacities(capacityId) {
    if (!form.capacities.includes(capacityId)) {
        form.capacities.push(capacityId);
    }
}

function submitCapacities() {
    console.log(form.capacities);
    router.put('/level-up/confirm_capacities', form.capacities);
}
</script>


<template>
    <Head title="Amélioration des capacités" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Amélioration des capacités
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Niveau {{ character.level - 1 }} --> {{ character.level }}
            </h2>
        </template>

        <div class="mx-auto px-4">
            <info-message>
                <p class="text-bold">
                    Cout en points de capacité :
                </p>
                <p>Niv 1/2 => 1 pt de capacité</p>
                <p>Niv 3/4/5 => 2 pts de capacité</p>
            </info-message>

            <h2 class="mt-4 text-xl text-center font-bold">
                Voies connues
            </h2>

            <Collapsible
                v-for="way in ownedWays" :key="way.id"
                :title="way.name"
            >

                <div
                    class="mt-2 bg-gray-200 rounded-lg p-4"
                    v-for="capacity in way.capacities" :key="capacity.id"
                    v-show="isUnknownCapacity(capacity.id)"
                >
                    <h3 class="font-bold" @click="addCapacities(capacity.id)">
                        Niv {{ capacity.level }} - {{ capacity.name }}
                    </h3>
                    <p>
                        {{ capacity.description }}
                    </p>
                </div>
            </Collapsible>

            <button
                type="submit"
                class="mt-4 px-4 py-2 rounded-lg bg-green-300"
                @click="submitCapacities"
            >
                Confirmer
            </button>
        </div>
    </AuthenticatedLayout>
</template>

