<?php
require_once('lib.php');

$printableAnon = new PrintableAnonFunction();

_step("GC Create Function Start!");
_mem();


_step("Anon function define");
$anon = function () {
    static $static = 0;
    $static = _data(1);
    $dynamic = _data(1);
    echo " --- in anon function ----" . PHP_EOL;
    _mem();
    echo " -------------------------" . PHP_EOL;
};

_mem();

_step("Anon function call");
$anon();
_mem();

$anonAlias = $anon;
_step("Anon function call again via alias");
$anonAlias();
_mem();

_step("Anon function remove");
unset($anon);
_mem();

_step("Anon function alias remove");
unset($anonAlias);
_mem();

$loop = 5;
for ($i = 1; $i <= $loop; $i++) {
    _step("Loop [$i/$loop] anon function define");
    $anon = function () {
        static $static = 0;
        $static = _data(1);
        $dynamic = _data(1);
    };
    _mem();

    _step("Loop [$i/$loop] anon function call [loop]");
    $anon();
    _mem();
}
