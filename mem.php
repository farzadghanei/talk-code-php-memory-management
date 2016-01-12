<?php

function do_stuff ($count) {
    // do stuff using dynamic memory
}

function main () {
    $count_items = 10; // assume this is determined on runtime
    do_stuff($count_items);
}

main();
