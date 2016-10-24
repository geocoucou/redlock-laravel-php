redlock-laravel-php - Redis locks in Laravel PHP

Forked from [redlock-php](https://github.com/ronnylt/redlock-php) by [Ronny Lopez](https://github.com/ronnylt)
(Thank you Ronny!)

To create a lock manager:

```php

$redLock = new \geocoucou\RedLock();

```

To acquire a lock:

```php

    $lock = $redLock->lock('my_resource_name', 1000);

```

Where the resource name is an unique identifier of what you are trying to lock
and 1000 is the number of milliseconds for the validity time.

The returned value is `false` if the lock was not acquired (you may try again),
otherwise an array representing the lock is returned, having three keys:

```php
Array
(
    [validity] => 9897.3020019531
    [resource] => my_resource_name
    [token] => 53771bfa1e775
)
```

* validity, an integer representing the number of milliseconds the lock will be valid.
* resource, the name of the locked resource as specified by the user.
* token, a random token value which is used to safe reclaim the lock.

To release a lock:

```php
    $redLock->unlock($lock)
```

It is possible to setup the number of retries (by default 3) and the retry
delay (by default 200 milliseconds) used to acquire the lock.

The retry delay is actually chosen at random between `$retryDelay / 2` milliseconds and
the specified `$retryDelay` value.

**Disclaimer**: NOT PRODUCTION READY
