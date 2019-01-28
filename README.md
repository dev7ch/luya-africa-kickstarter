# Website Kickstarter with LUYA CMS integration

This is a free and a ready-to-use skeleton for a travel agency website with integrated booking form and template module which let you adjust site name and logo from the admin UI.

### Requirements

- composer
- mysql and php

### Install

`composer create-project dev7ch/luya-africa-kickstarter`

Change into project directory and run  

`cp configs/env.php.dist configs/env.php` 

`cp configs/env-local-db.php.dist configs/env-local-db.php`  

- Create a new MySQL DB 

- Open the `configs/env-local-db.php` in your favorite editor to add de credentials.

- Migrate and install LUYA

`./luya migrate`  confirm migration  

`./luya import`  import basic settings  


### Backend

Create a new admin user  

`./luya admin/setup`

For more see the install instructions at https://luya.io/guide/install

### Frontend

Run `./vendor/bin/unglue compile` to compile all scss and js files.

For more see https://www.unglue.io/  

For development use `./vendor/bin/unglue watch`