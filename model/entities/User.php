<?php
class User
{
    private $id_user ;
    private $name ;
    private $email ;
    private $password;

    /**
    * @param array $donnees
    */
    public function __construct($donnees)
    {
        $this->hydrate($donnees);
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
    * Get the value of Name
    *
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }


    /**
    * Set the value of Name
    *
    * @param string name
    *
    */
    public function setName($name)
    {
        $this->name = $name;
    }



    /**
    * Get the value of Email
    *
    * @return string
    */
    public function getEmail()
    {
        return $this->email;
    }


    /**
    * Set the value of Email
    *
    * @param string email
    *
    */
    public function setEmail($email)
    {
        $this->email = $email;
    }



    /**
    * Get the value of Password
    *
    * @return string
    */
    public function getPassword()
    {
        return $this->password;
    }


    /**
    * Set the value of Password
    *
    * @param string password
    *
    */
    public function setPassword($password)
    {
        $pass = password_get_info($password);
        if($pass['algoName'] == 'unknown'){
          $hash = password_hash($password, PASSWORD_DEFAULT);
          $this->password = $hash;
        }
        else {
        $this->password = $password;
      }
    }
}
