<?php
require_once('lib.php');

_step("GC Cyclic Start!");
_mem();

_step("Bruce come");
$someData = _data();
$bruce = new User('bruce', '1960-12-26');
$bruce->store($someData);
_mem();
_var('someData');
_var('bruce');

_step("Robin come and talk to bruce");
$robin = new User('robin', '1970-10-14');
$robin->store($someData);

$bruce->talk($robin);
$robin->talk($bruce);
_mem();
_var('someData');
_var('bruce');
_var('robin');

_step("Clear all");
unset($robin);
unset($bruce);
unset($someData);
_mem();
_var('someData');
_var('bruce');
_var('robin');

_step("Collecting cycles");
gc_collect_cycles();
_mem();
