<?php


class ManagerItem
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb($db)
    {
        $this->_db = $db;
    }

    public function addItem(Item $item)
    {
        $test = $this->_db->prepare('INSERT INTO item(nom, date) values (:nom, :date)');
        $test->bindValue(':nom', $item->getNom());
        $test->bindValue(':date', date('Y-m-d H:i:s'));
        $test->execute();
    }

    public function getItem($id)
    {
        $reponse = $this->_db->query('SELECT id, nom, date FROM item where id = '.$id);
        $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

        return new Item($donnees);
    }

    public function getListItem()
    {
        $listItem = [];
        $reponse = $this->_db->query('SELECT id, nom, date FROM item ORDER BY date');

        while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
        {
            $listItem[] = new Item($donnees);
        }

        return $listItem;
    }

    public function updateItem(Item $item)
    {
        $test = $this->_db->prepare('UPDATE item SET nom = :nom, date = :date WHERE id =' . $item->getId());
        $test->bindValue(':nom', $item->getNom());
        $test->bindValue(':date', date('Y-m-d H:i:s'));

        $test->execute();
    }

    public function deleteItem(Item $item)
    {
        $this->_db->exec('DELETE FROM item where id=' . $item->getId());
    }


}