#ProductBundle

Neste Bundle Symfony foi:

 - CRUD gerado pelo symfony automáticamente
 ```sh
 $ php app\console generate:doctrine:crud --entity=AMZProductBundle:Product
 ```
 - Feito o refatoramento do: ProductController e classes ligadas a sua estrutura: Entities, Forms e etc.
 Aplicado princípios SOLID e Object Calisthenics
 - O CategoryController foi deixado com o código original gerado generate:doctrine:crud.


##Inside

URIs:

 - Index de Produtos: /product/
 - Index de Category /product/category/

Pacotes adicionais:

 - Insere conteúdo nas tabelas do Banco
    "doctrine/doctrine-fixtures-bundle": "2.2.*",
 - Gera Textos Aleatórios
    "fzaninotto/faker": "1.4.0"

### Todo's

 - Add Flash Message
 - Verify Exceptions
 - Error Page

