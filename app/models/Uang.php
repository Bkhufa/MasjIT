<?php

use Phalcon\Mvc\Model;

class Uang extends Model
{
    /**
     *
     * @var integer
     */
    public $uang_id;

    /**
     *
     * @var string
     */
    public $uang_pengirim;

    /**
     *
     * @var string
     */
    public $uang_pesan;

    /**
     *
     * @var integer
     */
    public $uang_nominal;
    
    /**
     *
     * @var integer
     */
    public $uang_total;

    /**
     *
     * @var string
     * @Column(column="created", type="string", nullable=false)
     */
    public $updated;

    public function initialize()
    {
        $this->setSchema("fppbkk");
        $this->setSource("Uang");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uang[]|Uang|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Uang|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}