window.onload = function() { // Assim que a tela for carregada a função declarada sera executada
    const modal = document.querySelector(".modal"); // Recebe objeto referente ao modal pegando a partir da classe 'modal'
    const buttonClose = modal.querySelector(".buttonClose"); // Recebe objeto referente ao botao de fechar pegando a partir da classe 'buttonClose'

    buttonClose.addEventListener("click", function() { // Adiciona um evento para caso o botao de fechar seja pressionado
        modal.style.display = 'none'; // Assim que pressionado, o botao de fechar altera a propriedade 'display' da classe do modal para 'none' tornando o modal invisível
    })

    const buttonOpenModal = document.getElementById("btnOpenModal"); // Recebe objeto referente ao botao de abrir pegando a partir da classe 'btnOpenModal'
    buttonOpenModal.addEventListener("click", function() {  // Adiciona um evento para caso o botao de abrir seja pressionado
        modal.style.display = 'block'; // Assim que pressionado, o botao de abrir altera a propriedade 'display' da classe do modal para 'block' tornando o modal visível
    })
}