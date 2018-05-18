# Website Kickstarter with LUYA CMS integration

This is a free skeleton for a reday to use travelangency website with integrated booking form and themem module wich let you adjust sitename and logo from the admin UI.

### Requirements

- composer
- npm
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

You could check with `./luya health` if all is set up fine

Create a new admin user  

`./luya admin/setup`


For more see the install instructions at https://luya.io/guide/install


Change into the `resources/` directory and install via npm  

`npm install`

> gulp-cli should be installed globally

Run `gulp` for compiling and `gulp watch` for instant recompile on changes

Run e.g, `gulp --env prod` to compile all assets for the prod server stage

