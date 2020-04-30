<?php

use Phalcon\Mvc\Model;

class Pendaftar extends Model
{
    /**
     *
     * @var integer
     */
    public $pendaftar_id;

    /**
     *
     * @var string
     */
    public $pendaftar_nama;

    /**
     *
     * @var string
     */
    public $pendaftar_contact;

    /**
     *
     * @var string
     */
    public $pendaftar_alamat;

    /**
     *
     * @var string
     */
    public $pendaftar_created;

    /**
     *
     * @var integer
     * @Column(column="created", type="string", nullable=false)
     */
    public $fk_kegiatan_id;

    public function initialize()
    {
        $this->setSchema("fppbkk");
        $this->setSource("Pendaftar");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pendaftar[]|Pendaftar|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pendaftar|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}