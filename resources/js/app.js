import 'flowbite';
import Dropzone from "dropzone"

Dropzone.autodiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dicDefaultMessage: 'Sube tu imagen aqui!',
    acceptFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dicRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
    
});