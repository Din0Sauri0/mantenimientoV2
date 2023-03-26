const btn = document.querySelector('#cancel_btn');
const btn_father = document.querySelector('#delete_father');

const delete_backdrop = () => {
    let index = document.querySelectorAll('div[modal-backdrop]');
    if(index.length > 1){
        index[1].remove();
    }else{
        return;
    }
}

btn.addEventListener('click', delete_backdrop);
btn_father.addEventListener('click', delete_backdrop);

