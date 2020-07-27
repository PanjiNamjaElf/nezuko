<p align="center">
 <img src="https://i.imgur.com/NSorxqH.png" alt="Nezuko - Content Management System - Cover Image">
</p>

---

<p align="center">
 <a href="https://github.styleci.io/repos/282619743?branch=master">
  <img src="https://github.styleci.io/repos/282619743/shield?branch=master" alt="StyleCI">
 </a>
</p>

## 🖥️ Installation

- Clone the repository to your local environment

```shell script
$ git clone https://github.com/PanjiNamjaElf/nezuko.git
```

- Copy `.env.dist` to `.env` and fill it with your APP and DB info

```shell script
$ php -r "file_exists('.env') || copy('.env.dist', '.env');"
```

- Install depedencies
```shell script
$ composer install && npm install && npm run prod
```

- Setup
```shell script
$ php artisan key:generate
$ php artisan migrate --seed
$ sudo chown -R www-data: storage bootstrap public config
```

- You can now go to your site's URL