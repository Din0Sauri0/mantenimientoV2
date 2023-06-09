import 'flowbite';
import Dropzone from "dropzone"

Dropzone.autodiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube tu imagen aquí!',
    acceptFiles: '.png,.jpg,.jpeg,.gif',
    addRemoveLinks: true,
    dicRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        if(document.querySelector('[name="img"]').value.trim()){
            const imageClient = {}
            imageClient.size = 1234;
            imageClient.name = document.querySelector('[name="img"]').value;

            this.options.addedfile.call(this, imageClient);
            this.options.thumbnail.call(this, imageClient, '/uploads/${imageClient.name}')

            imageClient.previewElement.classList.add('dz-successs', 'dz-complete');
        }
    }
    
});


dropzone.on('success', (file, response)=>{
    document.querySelector('[name="img"]').value = response.image;
});
dropzone.on('removedfile', ()=>{
    document.querySelector('[name="img"]').value = '';
})