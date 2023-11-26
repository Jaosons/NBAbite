async function read() {
    try {
        const response = await fetch('http://localhost:8000/api/usuarios/read', {
            method:'get',
            mode:'cors'}) 
        data = await response.json()
        
        show(data)
    } catch (error) {
        console.error(error)
    }
}

function show(users) {
    let output = '<table border="1">';
    
    // Cabeçalho da tabela
    output += '<tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Nascimento</th><th>CPF</th><th>E-mail</th><th>Senha</th><th>Gênero</th><th>Estado</th></tr>';

    for (let user of users) {
        output += `<tr><td>${user.id}</td><td>${user.nome}</td><td>${user.sobrenome}</td><td>${user.nascimento}</td><td>${user.cpf}</td><td>${user.email}</td><td>${user.senha}</td><td>${user.genero}</td><td>${user.estado}</td></tr>`;
    }

    output += '</table>';

    document.getElementById('lista').innerHTML = output;
}

function create() {
    var formulario = document.getElementById('create');
    var formData = new FormData(formulario);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:8000/api/usuario/create', true);

    // Configurar um ouvinte para processar a resposta do servidor
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Lógica para processar a resposta, se necessário
            console.log(xhr.responseText);
        }
    };

    // Enviar os dados do formulário
    xhr.send(formData);
}

function update() {
    var formulario = document.getElementById('update');
    var formData = new FormData(formulario);

    // Use fetch para enviar dados para a sua API
    fetch('http://localhost:8000/api/usuario/update/' + formData.get('idUsuario'), {
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            //'Authorization': 'Bearer SEU_TOKEN_DE_AUTORIZACAO', // Se estiver usando autenticação via token
        },
        body: JSON.stringify({
            nome: formData.get('novoNome'),
            sobrenome: formData.get('novoSobrenome'),
            nascimento: formData.get('novaNascimento'),
            cpf: formData.get('novoCpf'),
            email: formData.get('novoEmail'),
            senha: formData.get('novaSenha'),
            genero: formData.get('novoGenero'),
            estado: formData.get('novoEstado'),
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Lidar com a resposta da API, como redirecionar o usuário ou exibir uma mensagem
    })
    .catch(error => console.error('Erro:', error));
}

function delet() {
    var formulario = document.getElementById('update');
    var formData = new FormData(formulario);

    fetch('http://localhost:8000/api/usuario/delete/' + formData.get('idUsuario'), {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            //'Authorization': 'Bearer SEU_TOKEN_DE_AUTORIZACAO', // Se estiver usando autenticação via token
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Lidar com a resposta da API, como redirecionar o usuário ou exibir uma mensagem
        })
        .catch(error => console.error('Erro:', error));
}

function token() {
    // Faz uma requisição AJAX para obter o token CSRF
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/csrf-token', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var csrfToken = JSON.parse(xhr.responseText).csrf_token;

            // Adiciona o token CSRF como um campo oculto no formulário
            var formulario = document.getElementById('meuFormulario');
            var inputToken = document.createElement('input');
            inputToken.type = 'hidden';
            inputToken.name = '_token';
            inputToken.value = csrfToken;
            formulario.appendChild(inputToken);
        }
    };
    xhr.send();
}