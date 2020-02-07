<?php


class Item
{
    private $_id;
    private $_nom;
    private $_date;

    public function __construct(array $donnees)
    {
        $this->hydrat($donnees);
    }

    public function hydrat(array $donnees)
    {
        foreach ($donnees as $key => $valeur)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method))
            {
                $this->$method($valeur);
            }
        }
    }

    public function nomValide()
    {
        return !empty($this->_nom);
    }

    public function setId($id)
    {
        $id = (int)$id;
        if($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setNom($nom)
    {
        if(is_string($nom))
        {
            $this->_nom = $nom;
        }
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getDate()
    {
        return $this->_date;
    }
}