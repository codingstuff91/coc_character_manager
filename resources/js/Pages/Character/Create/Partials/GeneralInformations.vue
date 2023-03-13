<script setup>
import {ref, reactive, watch, onMounted} from "vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { useCharacterCreationStore } from "@/Stores/character-creation-store";

const store = useCharacterCreationStore();
const family = store.family;

const props = defineProps({
    families: Array,
    errors: Object,
});

const form = reactive({
    name: null,
    level: 1,
    gender: null,
    age: null,
    height: null,
});

const advantages = ref([]);
const profiles = ref([]);

watch(() => family.id, async () => {
    await store.setFamily(family.id);
    await store.getAdvantages(family.id);
    await store.getProfiles(family.id);
    await store.setLifeDiceScore(family.id);
});

watch(() => form.gender, async () => {
    await store.setGender(form.gender);
});

watch(() => form.name, async () => {
    await store.setName(form.name);
});

watch(() => form.level, async () => {
    await store.setLevel(form.level);
});

watch(() => form.age, async () => {
    await store.setAge(form.age);
});

watch(() => form.height, async () => {
    await store.setHeight(form.height);
});
</script>

<template>
        <div>
            <h2 class="text-xl font-bold mb-2">Informations générales</h2>
            <form
                class="w-full flex flex-col"
                @submit.prevent="submitForm"
            >
                <div class="flex justify-center mb-4">
                    <div class="w-2/4 flex flex-col">
                        <InputLabel class="mt-4" value="Famille de personnage"/>
                        <select v-model="family.id" class="rounded-lg">
                            <option v-for="family in families"
                                    :key="family.name"
                                    :value="family.id">
                                {{ family.name }} - {{ family.description }}
                            </option>
                        </select>
                        <p class="error-message" v-if="errors.family">{{ errors.family }}</p>
                    </div>
                </div>

                <section class="mx-auto">
                    <InputLabel class="mt-4" value="Sexe du personnage"/>
                    <input type="radio" id="feminin" value="F" v-model="form.gender" class="ml-2" />
                    <label for="feminin" class="ml-2">Féminin</label>

                    <input type="radio" id="masculin" value="M" v-model="form.gender" class="ml-2" />
                    <label for="masculin" class="ml-2">Masculin</label>

                    <p class="error-message" v-if="errors.gender">{{ errors.gender }}</p>
                </section>

                <section class="mt-4 grid grid-cols-6 gap-2">
                    <div class="col-span-3">
                        <InputLabel value="Nom"/>
                        <TextInput
                            class="px-4 py-2 w-full"
                            v-model="form.name"
                            placeholder="Son nom et prénom"
                        />
                        <p class="error-message" v-if="errors.name">{{ errors.name }}</p>
                    </div>

                    <div>
                        <InputLabel value="Niveau"/>
                        <TextInput
                            class="px-4 py-2 w-full"
                            type="number"
                            v-model="form.level"
                        />
                    </div>

                    <div>
                        <InputLabel value="Age"/>
                        <TextInput
                            class="px-4 py-2 w-full"
                            v-model="form.age"
                        />
                        <p class="error-message" v-if="errors.age">{{ errors.age }}</p>
                    </div>

                    <div>
                        <InputLabel value="Taille"/>
                        <TextInput
                            class="px-4 py-2 w-full"
                            v-model="form.height"
                        />
                        <p class="error-message" v-if="errors.height">{{ errors.height }}</p>
                    </div>
                </section>
            </form>
        </div>
</template>

