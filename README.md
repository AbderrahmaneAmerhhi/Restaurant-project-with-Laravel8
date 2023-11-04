[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://main--abderrahmaneamerrhiportfoliov2.netlify.app/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/abderrahmane-amerrhi-807b40201/)

# RESTAURANT WEB APP

A restaurant web application with laravel 8 that enables you to share menus, and customers can book orders and manage your restaurant in a simple and excellent way

Discover [Vedio](https://abderrahmaneamerrhi.com/assets/vedresto_withMusic-3035c394.mp4).

## Information

I built the app using laravel , made a simple backend CRUD and use blade in front end

### Technologies used in Backend

| Technology             |            Description             | Version |
| :--------------------- | :--------------------------------: | :-----: |
| Php                    |            PHP language            |  8.0.2  |
| Laravel                |     Laravel backend framework      |  ^8.65  |
| laravel/ui             |             UI Package             |  ^3.3   |
| realrashid/sweet-alert |        sweet-alert Package         |  ^5.0   |
| maatwebsite/excel      | Excel pacage for laravel framework |   3.1   |
| srmklive/paypal        |      paypal checkout Package       |  ~3.0   |

## Cloning and use

```bash or terminal
  # Cloning app
  git clone  https://github.com/AbderrahmaneAmerhhi/Restaurant-project-with-Laravel8

  # install composer
   composer install
   php artisan config:clear
   php artisan config:cache
  # copy .env.example => rename it to .env

  # generate App key
   php artisan key:generate

  # install node_modules
   npm install

```

## Configuration

```env
# in .env file config database

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabse_name
DB_USERNAME=root
DB_PASSWORD=databasepassword

# config Mail add your mail configuration

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# add your Paypal configuration
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_API_USERNAME=YourUserName
PAYPAL_SANDBOX_API_PASSWORD=YourPassword
PAYPAL_SANDBOX_API_SECRET=YourSecret


```

## Migrate database and run app

```bash or terminal
  ########### open app in terminal or cmd or bash ... ###############
  # Migrate data base run in terminal
   php artisan migrate

  # seed database
   php artisan db:seed

  # run app
  php artisan serve
   ## in other terminal
    npm run dev

  # open app in
  http://127.0.0.1:8000

  # login to admin dashboard
   Url :http://127.0.0.1:8000/login
   Email :   admin@gmail.com
   Password : admin


```

## Features

-   Dynamic backend with laravel Backend framework
-   Responsive front-end with blade template html css bootstrap ...

#### Dashboard Features

-   Administrators can food menus t categories, add new categories, update a category, delete a category

-   Administrators can also manage menus, edit, delete product view

-   Manage orders

-   manage visitors and users review accept them or remove them
-   manage Users Accounts
-   manage admin Account
-   Track data statistics into charts and cards
-   Export data with Excel

#### User side

-   Visitors can view your menus and restaurant information and can send you email Create a new account Log in...

-   To order a new menu, add a new review, the user must be connected to their own account
-   user can order menu and pay
-   User can like the list and can go back to favorite list list

-   Nice scroll banner

-   filter menus by categories

-   User can edit profile image and email password name ...

# Discover

Discover [Vedio](https://abderrahmaneamerrhi.com/assets/vedresto_withMusic-3035c394.mp4).
