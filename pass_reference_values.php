<?php
require_once('lib.php');

function dataSize($input) {
    echo '----> dataSize ' . PHP_EOL;
    _mem();
    xdebug_debug_zval_stdout('input');
    sizeof($input);
    // cant no use _var for input since function scope will change
    xdebug_debug_zval_stdout('input');
    echo '<---- ' . PHP_EOL;
}

function changeValueOf($input) {
    echo '----> changeValueOf ' . PHP_EOL;
    _mem();
    xdebug_debug_zval_stdout('input');
    $input = sizeof($input);
    _mem();
    // cant no use _var for input since function scope will change
    xdebug_debug_zval_stdout('input');
    echo '<---- ' . PHP_EOL;
}


function changeValueOfReference(&$input) {
    echo '----> changeValueOfReference ' . PHP_EOL;
    _mem();
    xdebug_debug_zval_stdout('input');
    $input = sizeof($input);
    _mem();
    // cant no use _var for input since function scope will change
    xdebug_debug_zval_stdout('input');
    echo '<---- ' . PHP_EOL;
}

_step("PHP values start!");
_mem();

$data = _data();

_step("Creating multiple data ...");
$all = [];
for ($i = 0; $i < 100; $i++) {
    $all[] = $data;
    _mem();
}

_mem();
_var('data');


_step("Pass string value to read");
dataSize($data);
_mem();
_var('data');

_step("Pass array value to read");
dataSize($all);
_mem();
_var('all');

_step("Pass string value to change");
changeValueOf($data);
_mem();
_var('data');

_step("Pass array value to change");
changeValueOf($all);
_mem();
_var('all');

// passing by reference to immutable values uses more memory in this case!
_step("Pass string reference to change");
changeValueOfReference($data);
_mem();
_var('data');

_step("Pass array reference to change");
changeValueOfReference($all);
_mem();
_var('all');
