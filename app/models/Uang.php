<?php

class Uang extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    protected $uang_id;

    /**
     *
     * @var string
     */
    protected $uang_pengirim;

    /**
     *
     * @var string
     */
    protected $uang_pesan;

    /**
     *
     * @var integer
     */
    protected $uang_nominal;

    /**
     *
     * @var string
     */
    protected $updated;

    /**
     *
     * @var string
     */
    protected $uang_bukti;

    /**
     * Method to set the value of field uang_id
     *
     * @param integer $uang_id
     * @return $this
     */
    public function setUangId($uang_id)
    {
        $this->uang_id = $uang_id;

        return $this;
    }

    /**
     * Method to set the value of field uang_pengirim
     *
     * @param string $uang_pengirim
     * @return $this
     */
    public function setUangPengirim($uang_pengirim)
    {
        $this->uang_pengirim = $uang_pengirim;

        return $this;
    }

    /**
     * Method to set the value of field uang_pesan
     *
     * @param string $uang_pesan
     * @return $this
     */
    public function setUangPesan($uang_pesan)
    {
        $this->uang_pesan = $uang_pesan;

        return $this;
    }

    /**
     * Method to set the value of field uang_nominal
     *
     * @param integer $uang_nominal
     * @return $this
     */
    public function setUangNominal($uang_nominal)
    {
        $this->uang_nominal = $uang_nominal;

        return $this;
    }

    /**
     * Method to set the value of field updated
     *
     * @param string $updated
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Method to set the value of field uang_bukti
     *
     * @param string $uang_bukti
     * @return $this
     */
    public function setUangBukti($uang_bukti)
    {
        $this->uang_bukti = $uang_bukti;

        return $this;
    }

    /**
     * Returns the value of field uang_id
     *
     * @return integer
     */
    public function getUangId()
    {
        return $this->uang_id;
    }

    /**
     * Returns the value of field uang_pengirim
     *
     * @return string
     */
    public function getUangPengirim()
    {
        return $this->uang_pengirim;
    }

    /**
     * Returns the value of field uang_pesan
     *
     * @return string
     */
    public function getUangPesan()
    {
        return $this->uang_pesan;
    }

    /**
     * Returns the value of field uang_nominal
     *
     * @return integer
     */
    public function getUangNominal()
    {
        return $this->uang_nominal;
    }

    /**
     * Returns the value of field updated
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Returns the value of field uang_bukti
     *
     * @return string
     */
    public function getUangBukti()
    {
        return $this->uang_bukti;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("fppbkk");
        $this->setSource("uang");
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
