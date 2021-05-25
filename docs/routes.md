# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/legal`| `GET`| `MainController` | `legal` | Legal Mentions | Legal Mentions | - |
| `/category/[i:id]` | `GET` | `CatalogController` | `category` | Dans les shoe | List products by category | (`[id]`) => : represents the id of the category |
| `/type/[i:id]` | `GET` | `CatalogController` | `type` | #Name of the type# |  Products attached to the type | (`[id]`) => represents the id of the type |
| `/brand/[i:id]` | `GET` | `CatalogController` | `brand` | #Name of the brand# | Products attached to the brand  | (`[id]`) => represents the id of the brand] |
| `/product/[i:id]` | `GET` | `CatalogController` | `product` | #Name of the Product# | Product details | (`[id]`) => represent the id of the product |

