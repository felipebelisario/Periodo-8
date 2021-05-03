window.onload = function() { // Ao carregar a tela executara a funcao declarada
    const campoInteresse = document.querySelector("#interesse"); // Recebendo objeto referente ao text field a partir de seu id 'interesse'
    campoInteresse.addEventListener("keyup", e => { // Declara um listener para cada tecla pressionada no teclado passando como argumento para a funcao o evento e suas caracteristicas
        if (e.key === "Enter") // Se a tecla pressionada for o Enter adiciona o interesse na lista
            adicionarInteresse(); 
    });

    const botaoAdicionar = document.querySelector("button"); // Recebendo objeto referente ao botão 'Adicionar' a partir de sua tag ja que so existe um botao no html
    botaoAdicionar.addEventListener("click", adicionarInteresse); // Coloca um listener em que para cada clique no botao é adicionado o interesse na lista
}

function adicionarInteresse() { // Declaracao da funcao que insere interesse na lista
    const campoInteresse = document.querySelector("#interesse"); // Recebendo objeto referente ao text field a partir de seu id 'interesse'
    const listaIntesses = document.querySelector("ol"); // Recebendo objeto referente a lista a partir de sua tag 'ol'

    const novoli = document.createElement("li");    // Cria um novo objeto de item de lista
    const novoSpan = document.createElement("span"); // Cria um novo objeto de span
    const novoBotao = document.createElement("button"); // Cria um novo objeto de botao que sera utilizado para remover o item da lista

    if(campoInteresse.value == '') { // Se o text field estiver vazio não adiciona esse vazio na lista
        return;
    }

    novoSpan.textContent = campoInteresse.value; // Atribui o conteudo a ser mostrado no span pegando o texto do text field
    novoBotao.textContent = 'X'; // Atribui o conteudo do botao de remocao do item da lista

    novoli.appendChild(novoSpan); // Adiciona o span dentro do item de lista
    novoli.appendChild(novoBotao); // Adiciona o botao de remocao dentro do item de lista
    listaIntesses.appendChild(novoli); // Adiciona o item de lista na lista

    novoBotao.onclick = function() {   // Declara um listener em que se o botao de remocao for pressionado o item sera removido da lista
        listaIntesses.removeChild(novoli);
    }

    campoInteresse.value = '';  // Esvazia o text input para que seja inserido um novo pelo usuario
}