# Website Kickstarter with LUYA CMS integration

This is a free skeleton for a reday to use travelangency website with integrated booking form and themem module wich let you adjust sitename and logo from the admin UI.

### Requirements

- composer
- mysql and php

### Install

`composer create-project dev7ch/luya-africa-kickstarter`

Change into project directory and run  

`cp configs/env.php.dist configs/env.php` 

`cp configs/env-local-db.php.dist configs/env-local-db.php`  

Create a new MySQL DB and open the `configs/env-local-db.php` in your favorite editor to add de credentials, e.g. Atom from cmd.

`atom configs/env-local-db.php`  

Run the LUYA setup

`./luya migrate`  confirm migration  

`./luya import`  import basic settings  


### Backend

Create a new admin user  

`./luya admin/setup`

For more see the install instructions at https://luya.io/guide/install

### Frontend

Run `./vendor/bin/unglue compile` to compile all scss and js files.

For more see https://www.unglue.io/

For development use 