<?php
require_once('lib.php');

_step("GC Create Function Start!");
_mem();

_step("Create function define");
$func = create_function('', <<<'FUNC'
    static $static = 0;
    $static = _data(1);
    $dynamic = _data(1);
    echo " --- in function ----" . PHP_EOL;
    _mem();
    echo " -------------------------" . PHP_EOL;
FUNC
);
_mem();
_var('func');

_step("Function call");
$func();
_mem();

$funcAlias = $func;
_step("Function call again via alias");
$funcAlias();
_mem();

_step("Function remove");
unset($func);
_mem();

_step("Function alias remove");
unset($funcAlias);
_mem();

$loop = 5;
for ($i = 1; $i <= $loop; $i++) {
    _step("Loop [$i/$loop] function create");
    $func = create_function('', <<<'FUNC'
    static $static = 0;
    $static = _data(1);
    $dynamic = _data(1);
    echo " --- in function ----" . PHP_EOL;
    _mem();
    echo " -------------------------" . PHP_EOL;
FUNC
);
    _mem();

    _step("Loop [$i/$loop] function call [loop]");
    $func();
    _mem();
    _var('func');
}
