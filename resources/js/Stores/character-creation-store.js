import { defineStore } from "pinia";
import Attributes from "@/Constants/AttributesConstants";
export const useCharacterCreationStore = defineStore('character-create',{
    state: () => {
        return {
            formStep: 1,
            attributes: [],
            families: [],
            family: {
                id: 0,
                lifeDiceScore: 0,
            },
            informations: {
                name: '',
                gender: '',
                level: 1,
                age: 0,
                height: 0,
                profile: {
                    id: 0,
                    name: '',
                },
                advantage: {
                    id: 0,
                    name: '',
                },
            },
            advantages: [],
            advantage: 0,
            profiles: [],
            profile: {
                id: 0,
                name: '',
            },
            characterWays: [],
            capacities: [],
            characterAttributes: {
                strength: {
                    id: Attributes.STRENGTH,
                    score: 0,
                    modificator: 0,
                },
                dexterity: {
                    id: Attributes.DEXTERITY,
                    score: 0,
                    modificator: 0,
                },
                constitution: {
                    id: Attributes.CONSTITUTION,
                    score: 0,
                    modificator: 0,
                },
                intelligence: {
                    id: Attributes.INTELLIGENCE,
                    score: 0,
                    modificator: 0,
                },
                charisma: {
                    id: Attributes.CHARISMA,
                    score: 0,
                    modificator: 0,
                },
                perception: {
                    id: Attributes.PERCEPTION,
                    score: 0,
                    modificator: 0,
                },
            },
            health_points: 0,
            luckPoints: 0,
        }
    },
    actions: {
        goToNextStep() {
            this.formStep++;
        },
        goToPreviousStep() {
          this.formStep--;
        },
        setFamilies(families) {
            this.families = families
        },
        setFamily(family) {
            this.family.id = family;
        },
        setLifeDiceScore(family) {
            let lifeDiceScoreToFind = this.families.find(element => {
                return element.id === family;
            });

            this.family.lifeDiceScore = lifeDiceScoreToFind.life_dice_score;
        },
        setGender(gender) {
          this.informations.gender = gender;
        },
        setName(name) {
          this.informations.name = name;
        },
        setAge(age) {
            this.informations.age = age;
        },
        setHeight(height) {
            this.informations.height = height;
        },
        setLevel(level) {
            this.informations.level = level;
        },
        setAdvantage(advantage) {
            this.informations.advantage.id = advantage;
        },
        setProfile(profile) {
          this.informations.profile.id = profile;
        },
        setAttributes(attributes) {
            this.attributes = attributes;
        },
        setCharacterAttributes(characterAttributes) {
            this.characterAttributes = characterAttributes;
        },
        getAdvantages(family) {
            // If the action or adventure family is chosen get the action advantages
            if(family === 1 || family === 2) {
                axios.get('/advantages/1/index').then(response => {
                    this.advantages = response.data;
                })
            } else {
                axios.get('/advantages/3/index').then(response => {
                    this.advantages = response.data;
                });
            }
        },
        getProfiles() {
            axios.get('/profiles/'+ this.family.id +'/index').then(response => {
                this.profiles = response.data;
            })
        },
        getCharacterWays(profile) {
            axios.get('/profiles/'+ profile +'/character_ways').then(response => {
                this.characterWays = response.data;
            });
        },
        setCapacities(capacities) {
            this.capacities = capacities;
        }
    }
})
