<?php
abstract class Account
{
    protected $id_account ;
    protected $id_user ;
    protected static $amount=20;
    protected $type;

    const Type = ["Pel","LivretA"];

    /**
 * @param array $donnees
 */
    public function __construct($donnees=NULL)
    {
        if (!empty($donnees)) {
            $this->hydrate($donnees);
        }
    }

    /**
     * @param  array  $donnees
     */
    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

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
     *
     */
    public static function setAmount()
    {
        $this->amount = static::$amount;
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
        if (in_array($type, self::Type)) {
            $this->type = $type;
        }
    }

    /**
     * Set amount with banking operation
     * @param  int $amount
     */
    public function withdrawal($a){
      $this->amount -= $a;
    }

    /**
     * Set amount with banking operation
     * @param  int $amount
     */
    public function add($a){
      $this->amount += $a;
    }
}
