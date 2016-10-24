<?php

require_once __DIR__ . '/../src/RedLock.php';


$redLock = new RedLock();

while (true) {
    $lock = $redLock->lock('test', 10000);

    if ($lock) {
        print_r($lock);
    } else {
        print "Lock not acquired\n";
    }
}
