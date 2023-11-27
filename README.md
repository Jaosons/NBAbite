# João Alexandre Nunes Belchior - 202303467079
# Samuel Bernardes - 202303459696
## Objetivo:
Buscamos fazer um site como o site "HLTV" mas diferente do HLTV, que tem seu foco em informar sobre o cenário competitivo de um jogo, iremos fazer sobre basquete.
### Em nosso site possui 6 páginas com conteudo, sendo elas as:
* [HOME/NOTÍCIAS]<a href="https://jaosons.github.io/NBAbite/" target="_blank">HOME/NOTÍCIAS</a>
* [TIMES](https://jaosons.github.io/NBAbite/src/html/times.html);
* [CLASSIFICAÇÃO](https://jaosons.github.io/NBAbite/src/html/classificacao.html);
* [SOBRE](https://jaosons.github.io/NBAbite/src/html/sobre.html);
* [CADASTRO](https://jaosons.github.io/NBAbite/src/html/cadastro.html).
### A página notícia foi formentada com algumas notícias de sites vinculado a nba (Espn, BuzzSport) sobre a temporada 2023-2024 que se deu inicio a temporada em 24 de outubro.
### A página times possui apenas os times mas separados por sua divisão com os times da conferência leste estando nas divisões Atlântico Central e Sudeste e os times da conferência oeste na Noroeste Pacífico e Sudoeste.
### A página classificação formentada por uma tabela que possui as informações Vitórias, Derrotas, a portecentagem de jogos ganho, Média de pontos feitos e tomado e o saldo de pontos mostrando se foi positivo ou negativo de cada time na temporada 2022-2023
### A página cadastro contendo 8 itens para ser cadastrado em nosso banco de dados para que a pessoa possa  e estar habita a receber por email sobre novidas e notícias.
### Cada pagina de conteudo possui um background realacinado ao basquete como a notcias mostrando um estádio, times um background com os escudos das 30 franquias da liga norte americana, de classificação tendo um background com fotos de lances de alguns dos jogadores mais imporante para liga e no sobre tendo a foto dos 3 maiores tecnicos que a liga ja teve Phill Jackson, Steve Kerr e Gregg Popovich

## Design do site:
https://wireframepro.mockflow.com/view/MmUpbWRJIpb
## Site está sendo construido com as seguintes linguagens:
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"> <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"> <img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E"> <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white"> <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"> <img src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white">
## Conteúdos do site: 
* A classficao da região Oeste e regiao Leste da NBA (temporodada 2022-23);
* Calendario da antiga temporada 2022-23;
* Perfil dos times;
* Perfil de algumas estrelas da NBA;
## Requisitos para começar
Antes de continuar para o site, será necessário fazer algumas tarefas para garantir que todas as funcionalidades do site estejam atualizadas
1. Clone o repositório na seu computador `git clone https://github.com/Jaosons/NBAbite.git`
2. Ligue o seu servidor local, o Apache por exemplo. Caso não tenha você pode baixar clicando neste <a href="https://sourceforge.net/projects/wampserver/files/latest/download">link</a>
3. Garanta que você tenha o Composer na sua máquina, caso não clique neste <a href="https://getcomposer.org/Composer-Setup.exe">link</a> para fazer o download
4. Abra o terminal do diretório "API-cadastros"
5. Execute as migrações do banco de dados com `php artisan migrate`
6. Inicie do servidor local com `php -S localhost:8000 -t public/`
## API
* `backend/API-usuario/app/Models/Usuario.php`: Utilizado para fazer a interação com o banco de dados
* `backend/API-usuario/app/Http/Controllers/Api/UsuarioController`: Ela define as funções do CRUD, como criar um usuário, listar os usuários, atualizar um usuário, ou deletar um usuário
* `backend/API-usuario/route`: Ela é utilizada para a criação de rotas para fazer uma interação especifíca entre o site e a API
* `backend/API-usuario/database/migrations/2023_11_25_221721_create_usuarios_table.php`: Utilizado para a criação da estrutura da tabela no banco de dados
## Exemplos do uso da API
### Listagem de usuários
1. Rota: `localhost:8000/api/usuarios/read`
2. Método: `GET`<br>
O retorno que a API vai nos dar vai ser uma lista dos usuários cadastrados no banco de dados<br>
O retorno:
```JSON
[
    {
        "id": 10,
        "nome": "Samuel",
        "sobrenome": "Bernardes",
        "nascimento": "2005-06-05",
        "cpf": "333-333-333-33",
        "email": "smk1b@gmail.com",
        "senha": "*******",
        "genero": "M",
        "estado": "SP"
    }
]
```
### Cadastro de usuário
1. Rota: `localhost:8000/api/usuario/create`
2. Método: `POST`<br>
O envio dos dados através de um formulário que tenha o token CSRF, irá ser transformado em um JSON para após ser enviado à API, que irá ser retornado uma resposta no console<br>
O retorno:
```
Conta cadastrada!
```
### Atualizar usuário
1. Rota: `localhost:8000/api/usuario/update/{id}`
2. Método: `PUT`<br>
A atualização dos dados será feita através de um formulário que tenha um token CSRF, irá ser transformado em um JSON após ser enviado à API, que irá ser retorna uma resposta no console<br>
O retorno
```
Conta atualizada!
```
### Deletar usuário
1. Rota: `localhost:8000/api/usuario/delete/{id}`
2. Método: `DELETE`<br>
A exclusão do usuário será feita através de um formulário  com um token CSRF que apenas pede o ID do elemento que será deletado, será enviado à API e então o usuário ira ser excluido do banco de dados trazendo uma mensagem de retorno no console.<br>
O retorno
```
Conta excluída!
```
### Geração dos tokens CSRF
1. Rota: `Não existe`
2. Método: `Não existe` <br>
Será feita um requisição através do HTML com a API para que seja gerado aleatoriamente um token CSRF e será implementado no formulário através de um script<br>
O script
```javascript
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
```
