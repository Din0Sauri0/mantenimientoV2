const btn = document.querySelector('#cancel_btn');
const delete_backdrop = () => {
    console.log('click');
    let index = document.querySelectorAll('div[modal-backdrop]');
    // index.setAttribute('id', 'backdrop');
    console.log(index);
    index.forEach(element => {
        element.remove();
    });
}
btn.addEventListener('click', delete_backdrop);

