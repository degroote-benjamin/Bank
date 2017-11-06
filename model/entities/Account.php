<?php
abstract class Account
{
    protected $id_account ;
    protected $id_user ;
    protected $amount ;
    protected $type;

    const type = ["PEL","Livret A"];

    /**
     * Get the value of Id Account
     *
     * @return int
     */
    public function getIdAccount()
    {
        return $this->id_account;
    }

    /**
     * Set the value of Id Account
     *
     * @param int id_account
     *
     */
    public function setId_account($id_account)
    {
        $this->id_account = $id_account;
    }

    /**
     * Get the value of Id User
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of Id User
     *
     * @param int id_user
     *
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * Get the value of Amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of Amount
     *
     * @param int amount
     *
     */
    public function setAmount($amount)
    {
        if ($amount>0) {
            $this->amount = $amount;
        }
    }

    /**
     * Get the value of Type
     *
     * @return varchar
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of Type
     *
     * @param varchar type
     *
     */
    public function setType($type)
    {
        if (in_array($type, self::type)) {
            $this->type = $type;
        }
    }
}