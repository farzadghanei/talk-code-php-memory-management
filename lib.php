<?php

function _step($message)
{
    static $step = 1;
    printf(PHP_EOL . "=========================" . PHP_EOL . "[%d] %s" . PHP_EOL, $step, $message);
    $step++;
}

function _mem()
{
    static $prevMem = 0;
    $mem = (memory_get_usage(false) / 1024);
    printf(
        '****  Memory Usage %.3f KB (%+.3f KB) ****' . PHP_EOL,
        $mem,
        $mem - $prevMem
    );
    $prevMem = $mem;
}

function _var($name)
{
    echo " -- \${$name} --" . PHP_EOL;
    xdebug_debug_zval_stdout($name);
    echo PHP_EOL;
}

function _data($megas = 1)
{
    $size = 1024 * 1024 * $megas;
    $result = array();
    for ($i = 0; $i < $size; $i++) {
        $result[] = '.';
    }
    return implode($result);
}

class User
{
    protected $name;
    protected $birthDate;
    protected $talking;
    protected $pocket;

    public function __construct($name, $birthDate)
    {
        $this->name = $name;
        $this->birthDate = new \DateTime($birthDate);
    }

    public function getAge()
    {
        $now = new \DateTime();
        return $now->diff($this->birthDate)->y;
    }

    public function intro()
    {
        return sprintf(
            "Hi, My name is %s and I'm %d years old",
            $this->name,
            $this->getAge()
        );
    }

    public function talk(User $other)
    {
        $this->talking = $other;
    }

    public function store($item)
    {
        $this->pocket = $item;
        return $this;
    }

    public function give()
    {
        return $this->pocket;
    }
}
