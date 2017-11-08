<?php
class Usermanager
{
    private $db; // Instance de PDO
    public function __construct($db)
    {
        $this->setDb($db);
    }
    // setter //
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function add($user)
    {
        $q = $this->db->prepare('INSERT INTO User set name=:name , email=:mail, password=:password');
        $q->bindValue(':name', $user->getName());
        $q->bindValue(':mail', $user->getEmail());
        $q->bindValue(':password', $user->getPassword());
        $q->execute();
    }

    public function get($user)
    {
        $q = $this->db->prepare('SELECT * from User where email = :email');
        $q->bindValue(':email', $user->getEmail());
        $q->execute();
        return new User($q->fetch());
    }
}
