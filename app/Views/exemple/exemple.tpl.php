<h1>
    Exemple contient la liste de nos exemples
</h1>
    <?php foreach($listOfExemple as $exemple) :?>
    <ul>
        <li>id: <?= $exemple->getId() ?></li>
        <li>created at: <?= $exemple->getCreatedat() ?></li>
        <li>updated at: <?= $exemple->getUpdatedAt() ?></li>
        <li>name: <?= $exemple->getName() ?></li>
        <li>email: <?= $exemple->getEmail() ?></li>
    </ul>
    <?php endforeach ?>


