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
    protected $kegiatan_foto;

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
     * Method to set the value of field kegiatan_foto
     *
     * @param string $uang_bukti
     * @return $this
     */
    public function setKegiatanFoto($kegiatan_foto)
    {
        $this->kegiatan_foto = $kegiatan_foto;

        return $this;
    }

    /**
     * Returns the value of field uang_bukti
     *
     * @return string
     */
    public function getKegiatanFoto()
    {
        return $this->kegiatan_foto;
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