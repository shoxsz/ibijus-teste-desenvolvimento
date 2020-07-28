# ibijus-teste-desenvolvimento
Teste de desenvolvimento para o Ibijus

# Instrução para execução

Coloque o código dentro da pasta que o seu servidor reconhece, baixe as dependências do **composer**, o projeto deve estar dentro de uma pasta chamada ***ibijus***, de forma que seja acessível pela url: `http://localhost/ibijus/`, exemplo: `http://localhost/ibijus/novo-local/`

# Explicação do Projeto

**Obs:** Optei por não usar nenhum framework, primeiro por preferência pessoal, eu gosto de escrever códigos mais limpos, no sentido de não serem carregados de dependências,
segundo para que minhas capacidades pudessem ser melhor avaliadas, criar uma aplicação totalmente independente exige mais do que apenas configurar e instalar um framework
com tudo pronto para criar o seu projeto, não tenho problemas em usar frameworks, sei que eles dão um boost muito grande na criação das aplicações e nos dão muita confiança
por terem um código já muito testado, e que é constatemente melhorado e corrigido.

O código possui uma arquitetura MVC, criei classes e funções para auxiliar o desenvolvimento seguindo essa arquitetura.

Todas as requisições são roteadas para o arquivo `index.php`, esse script faz o roteamento para um controller expecífico.

Dentro da pasta `scripts` existem outras pastas que compoem o projeto:

***controllers*** Todos os controllers da aplicação, a classe `BaseControler` pode ser herdada para obter acesso à métodos auxiliares, foram criados dois controllers, um para
lidar com as requisições REST e outro para lidar com as requisições de páginas HTML.

***helpers*** Códigos arbitrários, preferencialmente organizados em classes, que servem para ajudar no desenvolvimento da aplicação.

***models*** Models da aplicação, fornecem acesso aos dados, a classe `BaseModel` fornece acesso à uma conexão com o banco de dados da aplicação.

***routes*** Scripts para configurar as rotas da aplicação, a classe `Routes` é uma classe simplificada para fazer o roteamento das requisições, também é usada para configurar as rotas,
o script `app_routes.php` recebe uma instância `Routes` e configura ela com as rotas da aplicação.

***views*** Scripts php usados para construir o layout da aplicação, eles recebem dados dos controllers e usam isso para montar os layouts do site.
