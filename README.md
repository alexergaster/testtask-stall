# testtask-stall

## Тестове завдання розроблене для stall.com.ua

### Встановлення проєкту

Розархівуйте проєкт або клонуйте репозиторій:

```bash
     git clone https://github.com/alexergaster/testtask-stall.git
```

### Встановити дамп
Створити БД 
```bash
    mysql -u [username] -p -e "CREATE DATABASE testtask-stall;"
```

Відновлення бази даних з дампу

```bash
    mysql -u [username] -p [database_name] < /path/to/dump.sql
```



### Запуск серверу
Перейти в директорію backend та виконати команди:
```bash
    composer install
```

Створіть файл .env на основі .env.example та налаштуйте конфігурацію.

```bash
    cp .env.example .env
```
Встановити назву БД, у файлі .env:
`DB_DATABASE=testtask-stall
`
### Запуск проєкту 
Перейти в директорію frontend та виконати команди:

```bash
    npm i
    npm run dev
```
