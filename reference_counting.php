<?php
require_once('lib.php');

_step("GC Basics Start!");
_mem();

_step("Big string come");
$someData = _data();
_mem();

_step("Bruce come" );
$bruce = new User('bruce', '1960-12-26');
$bruce->store($someData);
_mem();

_step("Robin come");
$robin = new User('robin', '1970-10-14');
$robin->store($someData);
$bruce->talk($robin);
_mem();
_var('someData');
_var('bruce');
_var('robin');

_step("Robin go");
unset($robin);
_mem();
_var('someData');
_var('bruce');
_var('robin');

_step("Big string go");
unset($someData);
_mem();
_var('someData');
_var('bruce');
_var('robin');

_step("Bruce new pocket");
$bruce->store('OK');
_mem();
_var('bruce');

_step("Bruce go");
unset($bruce);
_mem();
_var('someData');
_var('bruce');
_var('robin');
