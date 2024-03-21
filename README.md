## Laravel Ozon Виджет для сайта
Виджет для вывода списка продуктов у определенного продовца с сайта Ozon

```
Widget::VISIBLE = Какие товары выводить [ALL, VISIBLE, TO_SUPPLY, IN_SALE, OVERPRICED] <a href="https://docs.ozon.ru/api/seller/#operation/ProductAPI_GetProductList">Ozon Api Seller</a>
Widget::LIMIT = Количество продуктов, которое будет выводить виджет
Widget::PRODUCTS = Индификаторы продуктов, которые будут выводится в виджете
Widget::CACHE_TIME = Количество секунд на которое кэшируется виджет
```