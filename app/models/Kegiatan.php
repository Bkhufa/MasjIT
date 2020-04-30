<?php

use Phalcon\Mvc\Model;

class Kegiatan extends Model
{
    /**
     *
     * @var integer
     */
    public $kegiatan_id;

    /**
     *
     * @var string
     */
    public $kegiatan_nama;

    /**
     *
     * @var string
     */
    public $kegiatan_deskripsi;

    /**
     *
     * @var string
     */
    public $kegiatan_waktu;

    /**
     *
     * @var string
     */
    public $kegiatan_tanggal;

    /**
     *
     * @var string
     */
    public $kegiatan_lokasi;

    /**
     *
     * @var string
     */
    public $kegiatan_foto;

    /**
     *
     * @var string
     */
    public $kegiatan_pendaftar;


    /**
     *
     * @var string
     * @Column(column="created", type="string", nullable=false)
     */
    public $kegiatan_updated;

    public function initialize()
    {
        $this->setSchema("fppbkk");
        $this->setSource("Kegiatan");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kegiatan[]|Kegiatan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kegiatan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}