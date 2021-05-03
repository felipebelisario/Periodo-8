window.onload = function() { // Ao carregar a tela executa a funcao declarada
    document.forms.formCadastro.onsubmit = validaForm; // Recebe o objeto formulario definido no html e adiciona uma funcao a ser executada quando esse formulario for enviado
}

function validaForm(e) { // Declaracao da funcao validaForm recebendo o evento como parametro
    let form = e.target; // Recebe objeto do formulario que se encontra dentro do objeto de evento
    let formValido = true; // Declara a variavel 'formValido' como um booleano de valor true

    const spanUsuario = form.usuario.nextElementSibling; // Recebe o span referente ao input de usuario do formulario
    const spanSenha = form.senha.nextElementSibling; // Recebe o span referente ao input de senha do formulario
    const spanEmail = form.email.nextElementSibling; // Recebe o span referente ao input de email do formulario

    spanUsuario.textContent = ""; // Seta inicialmente o span de usuario como vazio
    spanSenha.textContent = ""; // Seta inicialmente o span de senha como vazio
    spanEmail.textContent = ""; // Seta inicialmente o span de email como vazio

    if (form.usuario.value === "") { // Na submissao do formulario, se o imput de usuario estiver vazio
        spanUsuario.textContent = 'O usuario deve ser preenchido!'; // Seta o span do usuario com a frase indicando o erro
        formValido = false; // Seta 'formValido' como falso pra indicar que o formulario nao pode ser submetido
    }

    if (form.senha.value === "") { // Na submissao do formulario, se o imput de senha estiver vazio
        spanSenha.textContent = 'A senha deve ser preenchida!'; // Seta o span do senha com a frase indicando o erro
        formValido = false; // Seta 'formValido' como falso pra indicar que o formulario nao pode ser submetido
    }

    if (form.email.value === "") { // Na submissao do formulario, se o imput de email estiver vazio
        spanEmail.textContent = 'O email deve ser preenchido!'; // Seta o span do email com a frase indicando o erro
        formValido = false; // Seta 'formValido' como falso pra indicar que o formulario nao pode ser submetido
    }

    return formValido; // Retorna true ou false, se true o formulario eh valido e pode ser submetido, se false o formulario eh invalido e nao pode ser submetido
}