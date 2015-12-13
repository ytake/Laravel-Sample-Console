<?php

namespace Ytake\Laravel\SampleConsole\DataStorage;

/**
 * Class Accessor
 */
abstract class Accessor
{
    /** @var array  */
    protected $data = [];

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
