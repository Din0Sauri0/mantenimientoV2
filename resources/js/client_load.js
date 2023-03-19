const client = document.querySelector('#client');
const client_repre = document.querySelector('#client_repre');

const clean_select = (arr) => {
    for(let i = client_repre.options.length; i>=0; i--){
        client_repre.remove(i);
    }
}

const add_value_option = (arr) => {
    const option = document.createElement('option');
    arr.forEach(element => {
        const option = document.createElement('option');
        const value = element.id;
        const text = element.name +' '+ element.last_name;
        option.value = value;
        option.text = text;
        client_repre.appendChild(option);
        
    });
}

const listen = () => {
    const user_client = 'http://127.0.0.1:8000/api/get_client/'+client.value;
    fetch(user_client).then(data=>{return data.json()}).then(res=>{
        clean_select(res)
        add_value_option(res);
    });

}

client.addEventListener('change', listen);