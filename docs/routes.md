# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/public-url/with-sub-folder/[and-dynamic-part]` | `GET` ou `POST` | `ControllerName` | `methodName` | Titre de la page | Description of page's content | Explain here the dynamics parts of your URL (`[]`) |
|`/mentions-legales/`|`GET`|`MainController`|`legalNotice`|Mentions légales|list of legal notices| - |
|`/catalogue/categorie/12`|`GET`|`CatalogController`|`category`|Dans les shoe|a page of articles of a desired category|[12] a number that represents a category|
|`/catalogue/type/40`|`GET`|`CatalogController`|`type`|Dans les shoe|a page of articles of a desired type|[40] a number that represents a type|
|`/catalogue/marque/2`|`GET`|`CatalogController`|`mark`|Dans les shoe|a page of articles of a desired mark|[2] a number that represents a mark|
|`/catalogue/produit/4`|`GET`|`CatalogController`|`product`|Dans les shoe|a page of an article|[4] a number that represents a product|
