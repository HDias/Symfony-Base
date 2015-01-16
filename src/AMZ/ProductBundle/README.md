#ProductBundle

Neste Bundle Symfony foi:

 - CRUD gerado pelo symfony automáticamente
 ```sh
 $ php app\console generate:doctrine:crud --entity=AMZProductBundle:Product
 ```
 - Refatorado para correção de alguns problemas com o código gerado, como acoplamento

##Inside

URIs:

 - Index de Produtos: http://127.0.0.1:8000/product/
 - Index de Category http://127.0.0.1:8000/product/category/

Depêndencias adicionais:

 - Insere conteúdo nas tabelas do Banco
    "doctrine/doctrine-fixtures-bundle": "2.2.*",
 - Gera Textos Aleatórios
    "fzaninotto/faker": "1.4.0"

### Todo's

 -

