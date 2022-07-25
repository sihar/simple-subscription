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
php artisan notification:send your_url
```

### Other Link
<a href="https://documenter.getpostman.com/view/14022441/UzXKXKFq">Postman Documentation</a>  

[Postman Collection](postman/simple_subscription.postman_collection.json)