window.onload = function() { // Ao carregar a tela executara a funcao declarada
    buttons = document.querySelectorAll("nav button"); // Recebe os objetos de todos os botoes do html
    for (let button of buttons) {   // Passa por cada um dos objetos de botao adicionando seus respectivos eventos para caso seja pressionado
        button.addEventListener("click", changeTab); // Caso alguem clique no botao sera chamada a funcao 'changeTab'
    }
    openTab(0); // Ao carregar a pagina ja inicia com o primeiro botao pressionado
}

function changeTab(e) { // Declaracao da funcao changeTab recebendo o evento como parametro
    const botaoAcionado = e.target; // Recebe o objeto do botao que foi pressionado atraves do evento recebido via parametro
    const liDoBotao = botaoAcionado.parentNode; // Como o botao esta dentro de uma lista aqui se recebe a tag pai do botao que seria o objeto 'li'
    const nodes = Array.from(liDoBotao.parentNode.children); // A partir do parente do objeto 'li' do botao temos acesso a toda a lista de botoes e com isso setamos ela como array em um const
    const index = nodes.indexOf(liDoBotao); // Com o array de todos os botoes em maos eh possivel descobrir qual a posicao do botao que foi pressionado no evento atual
    openTab(index); // Chama a funcao openTab passando o numero da posicao do botao como parametro
}

function openTab(i) { // Declaracao da funcao openTab recebendo index do botao como parametro
    const tabActive = document.querySelector(".tabActive"); // Recebe o objeto do section que possui a classe 'tabActive' indicando que eh o section atualmente visivel
    if (tabActive !== null) {  // Se existir um section visivel 
        tabActive.className = ""; // Esse section eh ocultado atraves da remocao da classe 'tabActive' deixando a classe vazia
    }

    const buttonActive = document.querySelector(".buttonActive");  // Recebe o objeto do botao que possui a classe 'buttonActive' indicando que eh o botao atualmente acionado
    if (buttonActive !== null) { // Se existir um botao ja acionado 
        buttonActive.className = ""; // Esse botao eh desacionado atraves da remocao da classe 'buttonActive' deixando a classe vazia
    }

    document.querySelectorAll(".tabs section")[i].className = "tabActive"; // Pega o objeto correspondente ao section que se encontra naquela posicao passada via parametro dentro da div e seta nele a classe 'tabActive' para torna-lo visivel
    document.querySelectorAll("nav button")[i].className = "buttonActive"; // Pega o objeto correspondente ao botao que se encontra naquela posicao passada via parametro dentro do nav e seta nele a classe 'buttonActive' para aciona-lo

}