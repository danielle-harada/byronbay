let input_cep = document.querySelector('#cep');

input_cep.addEventListener('change', function(event){
    console.log("MUDOU!");

let cep = event.target.value;

fetch("https://viacep.com.br/ws/"+cep+"/json/")
.then(function(response){
    return response.json();
})
.then(function (data){
    let {
        logradouro,
        bairro,
        localidade,
        uf,
    } = data

            document.querySelector('#street').value = logradouro;
            document.querySelector('#neighborhood').value = bairro;
            document.querySelector('#city').value = localidade;
            document.querySelector('#state').value = uf;
        })
    })
