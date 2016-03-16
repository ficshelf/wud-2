# Backend Test - Martin Szyllo

---
## INTRO:

I had to learn just enough of Laravel (5.x) to understand if I can handle this job in real life. I could have achieved the same results (or better) in a fraction of time had I used a different stack, but in my view it would not be reflective of the potential task at hand. So I went the long route for the benefit of both parties.


## RESULT:

A CRUD RESTFUL API tested with POSTMAN

```
+--------+-----------+-----------------------------------------------------+-----------------------------------+---------------------------------------------------------+------------+
| Domain | Method    | URI                                                 | Name                              | Action                                                  | Middleware |
+--------+-----------+-----------------------------------------------------+-----------------------------------+---------------------------------------------------------+------------+
|        | GET|HEAD  | /                                                   |                                   | Closure                                                 |            |
|        | GET|HEAD  | api/v1/claim_status_codes                           | api.v1.claim_status_codes.index   | App\Http\Controllers\ClaimStatusCodesController@index   |            |
|        | POST      | api/v1/claim_status_codes                           | api.v1.claim_status_codes.store   | App\Http\Controllers\ClaimStatusCodesController@store   |            |
|        | GET|HEAD  | api/v1/claim_status_codes/create                    | api.v1.claim_status_codes.create  | App\Http\Controllers\ClaimStatusCodesController@create  |            |
|        | PUT|PATCH | api/v1/claim_status_codes/{claim_status_codes}      | api.v1.claim_status_codes.update  | App\Http\Controllers\ClaimStatusCodesController@update  |            |
|        | DELETE    | api/v1/claim_status_codes/{claim_status_codes}      | api.v1.claim_status_codes.destroy | App\Http\Controllers\ClaimStatusCodesController@destroy |            |
|        | GET|HEAD  | api/v1/claim_status_codes/{claim_status_codes}      | api.v1.claim_status_codes.show    | App\Http\Controllers\ClaimStatusCodesController@show    |            |
|        | GET|HEAD  | api/v1/claim_status_codes/{claim_status_codes}/edit | api.v1.claim_status_codes.edit    | App\Http\Controllers\ClaimStatusCodesController@edit    |            |
|        | POST      | api/v1/claims                                       | api.v1.claims.store               | App\Http\Controllers\ClaimsController@store             |            |
|        | GET|HEAD  | api/v1/claims                                       | api.v1.claims.index               | App\Http\Controllers\ClaimsController@index             |            |
|        | GET|HEAD  | api/v1/claims/create                                | api.v1.claims.create              | App\Http\Controllers\ClaimsController@create            |            |
|        | DELETE    | api/v1/claims/{claims}                              | api.v1.claims.destroy             | App\Http\Controllers\ClaimsController@destroy           |            |
|        | PUT|PATCH | api/v1/claims/{claims}                              | api.v1.claims.update              | App\Http\Controllers\ClaimsController@update            |            |
|        | GET|HEAD  | api/v1/claims/{claims}                              | api.v1.claims.show                | App\Http\Controllers\ClaimsController@show              |            |
|        | GET|HEAD  | api/v1/claims/{claims}/edit                         | api.v1.claims.edit                | App\Http\Controllers\ClaimsController@edit              |            |
|        | GET|HEAD  | api/v1/defendants                                   | api.v1.defendants.index           | App\Http\Controllers\DefendantsController@index         |            |
|        | POST      | api/v1/defendants                                   | api.v1.defendants.store           | App\Http\Controllers\DefendantsController@store         |            |
|        | GET|HEAD  | api/v1/defendants/create                            | api.v1.defendants.create          | App\Http\Controllers\DefendantsController@create        |            |
|        | DELETE    | api/v1/defendants/{defendants}                      | api.v1.defendants.destroy         | App\Http\Controllers\DefendantsController@destroy       |            |
|        | PUT|PATCH | api/v1/defendants/{defendants}                      | api.v1.defendants.update          | App\Http\Controllers\DefendantsController@update        |            |
|        | GET|HEAD  | api/v1/defendants/{defendants}                      | api.v1.defendants.show            | App\Http\Controllers\DefendantsController@show          |            |
|        | GET|HEAD  | api/v1/defendants/{defendants}/edit                 | api.v1.defendants.edit            | App\Http\Controllers\DefendantsController@edit          |            |
|        | GET|HEAD  | api/v1/legal_events                                 | api.v1.legal_events.index         | App\Http\Controllers\LegalEventsController@index        |            |
|        | POST      | api/v1/legal_events                                 | api.v1.legal_events.store         | App\Http\Controllers\LegalEventsController@store        |            |
|        | GET|HEAD  | api/v1/legal_events/create                          | api.v1.legal_events.create        | App\Http\Controllers\LegalEventsController@create       |            |
|        | PUT|PATCH | api/v1/legal_events/{legal_events}                  | api.v1.legal_events.update        | App\Http\Controllers\LegalEventsController@update       |            |
|        | DELETE    | api/v1/legal_events/{legal_events}                  | api.v1.legal_events.destroy       | App\Http\Controllers\LegalEventsController@destroy      |            |
|        | GET|HEAD  | api/v1/legal_events/{legal_events}                  | api.v1.legal_events.show          | App\Http\Controllers\LegalEventsController@show         |            |
|        | GET|HEAD  | api/v1/legal_events/{legal_events}/edit             | api.v1.legal_events.edit          | App\Http\Controllers\LegalEventsController@edit         |            |
+--------+-----------+-----------------------------------------------------+-----------------------------------+---------------------------------------------------------+------------+
```
 

## WHAT'S MISSING?

Nice views. Yes there are some files under resources/views, but these were my learning playground.



---

## Step 1 install LAMP

### a. Install PHP 5.5

```
sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php5
sudo apt-get update
sudo apt-get install -y php5 php5-mcrypt php5-gd
```

### b. Install Apache2

```
sudo apt-get install apache2 libapache2-mod-php5
```


### c. Install MySQL and PHP API
```
sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
```

## Step 2 â Install Composer

Composer is required for installing Laravel dependencies. So use below commands to download and use as a command in our system.

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

## Step 3 â Install Laravel

```
composer global require "laravel/installer"
```

update PATH
...


```
sudo -i
cd /var/www
laravel new html
cd html
```

----------------

## Step 2.

Please see the attached laravel dump.

------

## Step 3.

### POSTMAN SCREENSHOTS

![alt text](https://github.com/ficshelf/wud-2/blob/master/postman1.png "screenshot1")

![alt text](https://github.com/ficshelf/wud-2/blob/master/postman2.png "screenshot2")

![alt text](https://github.com/ficshelf/wud-2/blob/master/postman3.png "screenshot2")

----


## Step 4.

SQL Query:

I have fallen on my sword here. Could I get it right EVENTUALLY? Yes. Is my SQL rusty? Yes. 

I would simply implement it as a set of smaller queries. Oh well.

...
