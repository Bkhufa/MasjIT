<?php

use Phalcon\Mvc\Model;

class Saran extends Model
{
    /**
     *
     * @var integer
     */
    public $saran_id;

    /**
     *
     * @var string
     */
    public $saran_name;

    /**
     *
     * @var string
     */
    public $saran_category;

    /**
     *
     * @var string
     */
    public $saran_isi;

    /**
     *
     * @var string
     * @Column(column="created", type="string", nullable=false)
     */
    protected $created;

    public function initialize()
    {
        $this->setSchema("fppbkk");
        $this->setSource("Saran");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Saran[]|Saran|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Saran|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}