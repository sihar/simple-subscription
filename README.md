## Simple Subscription

Feature
- endpoint post
- command to send email
- queue to schedule sending in background

### Installation
- git clone from repo
- copy .env.example to .env
- make adjustment to that file
- php artisan migrate

### Send Email to subscriber
```php
php artisan notification:send
```