## eStore - Mini Ecommerce Website using Laravel 10

eStore is the Mini ecommerce website where you can find products and order.

---

#### System Requirements

-   Laravel 10+
-   PHP 8+
-   Composer 2.5+

---

### Getting Started

Execute the following commands in your terminal one by one.

##### Clone the repository to your local system

```
git clone https://github.com/abarnap/estore-task.git
```

##### Go to the root directory of the project.

```
cd estore-task
```

##### Create a duplicate of.env from the.env.example.

```
cp .env.example .env
```

> Important: Configure your database & mail details in .env file.

##### Install the composer's needed packages.

```
composer install
```

##### Migration & Seeding

```
php artisan migrate --seed
```

> Before seeding data you should change the `SEED_FACTORY` to `true` in your .env file and you can set the seed count by changing the `SEED_FACTORY_COUNT` variable in the .env file

##### Run your project

```
php artisan serve
```

> Url: [http://127.0.0.1:8000](http://127.0.0.1:8000/)
