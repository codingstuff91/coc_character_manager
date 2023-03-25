import AttributesConstants from "@/Constants/AttributesConstants";
const images_path = AttributesConstants.IMAGES_PATH;


export function getFullImagePath(image) {

    return images_path +'/'+image ;

}
