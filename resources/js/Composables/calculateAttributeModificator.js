import {ref} from "vue";
export function calculateAttributeModificator(attributeScore) {
    let modificator = ref(0);

    switch (true) {
        case (attributeScore > 0 && attributeScore <= 3):
            modificator.value = -4;
            break;
        case (attributeScore >= 4 && attributeScore <= 5):
            modificator.value = -3;
            break;
        case (attributeScore >= 6 && attributeScore <= 7):
            modificator.value = -2;
            break;
        case (attributeScore >= 8 && attributeScore <= 9):
            modificator.value = -1;
            break;
        case (attributeScore >= 10 && attributeScore <= 11):
            modificator.value = 0;
            break;
        case (attributeScore >= 12 && attributeScore <= 13):
            modificator.value = 1;
            break;
        case (attributeScore >= 14 && attributeScore <= 15):
            modificator.value = 2;
            break;
        case (attributeScore >= 16 && attributeScore <= 17):
            modificator.value = 3;
            break;
        case (attributeScore >= 18 && attributeScore <= 19):
            modificator.value = 4;
            break;
        case (attributeScore >= 20 && attributeScore <= 21):
            modificator.value = 5;
            break;
    }

    return modificator;
}
