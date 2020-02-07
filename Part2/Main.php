<?php
function chargerClasse($classe)
{
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

session_start();

$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$manager = new ManagerItem($db);

if(isset($_POST['ajouter']) and isset($_POST['nom'])) //test si on a cliquer sur ajouter
{
    $item = new Item(['nom' => $_POST['nom']]);

    if($item->nomValide())
    {
        $manager->addItem($item);
        header('location: Main.php');
    }
    else
    {
        $message = 'Le nom choisi est invalide.';
        unset($item);
    }
}

elseif(isset($_GET['up'])) //Recuperation item a updater -> enregistrement de celui ci en session
{
    $itemAUpdater = $manager->getItem($_GET['up']);
    $_SESSION['itemAUpdater'] = $itemAUpdater;
    header('location: Main.php');
}
elseif (isset($_GET['del'])) //test pour delete item
{
    $itemADel = $manager->getItem($_GET['del']);
    $manager->deleteItem($itemADel);
    header('location: Main.php');
}
elseif (isset($_POST['upd'])and isset($_POST['nom'])) //Recuperation du nom du nouveau item -> modification du nom de l'ancien + update bdd
{
    $itemAUpdater = $_SESSION['itemAUpdater'];
    $itemAUpdater->setNom($_POST['nom']);
    if($itemAUpdater->nomValide())
    {
        $manager->updateItem($itemAUpdater);
    }
    else
    {
        unset($itemAUpdater);
    }


    session_destroy();
    header('location: Main.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste items</title>

    <meta charset="utf-8" />
</head>
<body>

<?php
if(isset($message))
{
    echo '<p>' . $message .'</p>';
}?>

<a href="?ajout=oui"><strong>Ajouter un nouveau item ?</strong> </a> <br/>
<a href="?delete=oui"><strong>Supprimer un item ?</strong></a> <br/>
<a href="?update=oui"><strong>Modifier un item ?</strong></a> <br/>


<fieldset>
    <legend>Liste d'item</legend>
    <?php
    $listItem = $manager->getListItem();
    if(empty($listItem))
    {
        echo 'Aucun item enregistré. Veuillé en rajouter';
    }
    else
    {
        if(isset($_GET['delete']))
        {
            foreach ($listItem as $unItem)
            {
                echo '<a href="?del=' . $unItem->getId() . '">'  . $unItem->getNom() . '</a> (date : ' . $unItem->getDate() . ')<br/>';
            }
        }
        elseif(isset($_GET['update']))
        {
            foreach ($listItem as $unItem)
            {
                echo '<a href="?up=' . $unItem->getId() . '">'  . $unItem->getNom() . '</a> (date : ' . $unItem->getDate() . ')<br/>';
            }
        }
        else
        {
            foreach ($listItem as $unItem)
            {
                echo $unItem->getNom() . ' (date : ' . $unItem->getDate() . ')<br/>';
            }
        }

    }
    ?>
</fieldset>
<?php
if(isset($_GET['ajout'])or empty($listItem) or isset($_SESSION['itemAUpdater']))
{
    ?>

    <form action="" method="post">
        <p>
            Nom : <input type="text" name="nom" maxlength="50" />
            <?php if(isset($_GET['ajout'])or empty($listItem))
            {?>
                <input type="submit" value="Ajouter un item" name="ajouter" />
                <?php
            }
            elseif (isset($_SESSION['itemAUpdater']))
            {?>
                <input type="submit" value="Update un item" name="upd" />
                <?php
            }
            ?>


        </p>
    </form>

    <?php
}
?>

</body>
</html>