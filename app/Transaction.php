<?php

namespace App;

use Acacha\Stateful\Contracts\Stateful;
use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App
 */
class Transaction extends Model implements Stateful
{
    use StatefulTrait;

    /**
     * @var array
     */
    protected $fillable = ['name','state'];

    /**
     * Transaction States
     *
     * @var array
     */
    protected $states = [
        'draft' => ['inital' => true],
        'processing',
        'errored',
        'active',
        'closed' => ['final' => true]
    ];

    /**
     * Transaction State Transitions
     *
     * @var array
     */
    protected $transitions = [
        'process' => [
            'from' => ['draft', 'errored'],
            'to' => 'processing'
        ],
        'activate' => [
            'from' => 'processing',
            'to' => 'active'
        ],
        'fail' => [
            'from' => 'processing',
            'to' => 'errored'
        ],
        'close' => [
            'from' => 'active',
            'to' => 'close'
        ]
    ];

    /**
     * @return bool
     */
    protected function validateProcess()
    {
        $validate = true;
        if (!$validate) {
            $this->addValidateProcessMessage();
        }

        return $validate;
    }

    /**
     * @return bool
     */
    protected function validateActivate()
    {
        //dd("validateActivate");
        return true;
    }

    /**
     * @return bool
     */
    protected function validateFail()
    {
        //dd("validateFail");
        return true;
    }

    /**
     * @return bool
     */
    protected function validateClose()
    {
        //dd("validateClose");
        return true;
    }
    
    protected function beforeProcess() {
        //dd("doing something before entering processing state");
    }

    protected function afterProcess() {
        //dd("doing something after leaving processing state");
    }

}

