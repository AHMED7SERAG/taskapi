


## Installation 

#### 1 -  clone repo
```
git clone https://gitlab.com/acme-saico-2020/clients/national-archives-of-egypt-nae/archiving-solution-as.git
```

#### 2 -  install dependencies via terminal
```
composer install 

npm install
```

#### 3 -  compile project
```
npm run dev 
```

#### 4 -  copy .env.example to .env

====================================

after setup environment variables in .env file 


##    install database

#### 5 -  install tables

````
php artisan migrate
````

#### 6 -  get seed data

````
php artisan db:seed
````
  


````
php artisan db:seed --class=PermissionSeeder
````

#### 7 -  generate key

````
php artisan key:generate
````



now you can start project by `php artisan serve`
 


 ````````````
 http://127.0.0.1:8000/dashboard/login

 and admin 
 email ====> admin@admin.com,
password ====> 123456789,

and for api use 
 email ====> user@user.com,
password ====> 123456789,
 ````````````

 ````````````````````
 find collection for api and will find admin panel fir admin task in file 


 task api.postman_collection

 open by postman
 ````````````````````