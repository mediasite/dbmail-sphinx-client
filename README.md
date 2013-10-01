## Общие данные
* Каждый запрос должен содержать заголовок `SecKey`, который должен быть равен параметру `secretKey` в файле params.php
* В случае ошибки возвращает следующий ответ, где `httpReturnCode` - int, код состояния http ответа:
    
    ```js
    {"status": httpStatusCode, "message": "Human error message"}
    ```

## Доступные методы

## GET `/v1/sphinxUri/{userId}`
Вовзращает 
Запускает переиндексацию конкретного пользователя и ожидает окончания ее.

**Принимает:**
* В адресной строке, `userId`, int - id пользователя, данные которого требуется переиндексировать.

**Возвращает в случае успешной работы:**
```js
{"status": 200, "sphinxUri": "192.168.1.1:9036"}
```
