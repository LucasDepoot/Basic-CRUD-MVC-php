<h1>
    ici un formulaire pour mettre a jour nos exemples</h1>
    <form action="" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= $exemple->getName() ?>" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $exemple->getEmail() ?>" required><br>

        <button type="submit">Modifier</button>
    </form>