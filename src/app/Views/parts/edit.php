<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <form action="<?= URL_ROOT . '/parts/edit/' . $data['part']->getId() ?>" method="post">
        <div>
            <label for="number">Numer części</label>
            <input type="text" name="number" value="<?= $data['part']->getNumber() ?>" required>
        </div>

        <div>
            <label for="name">Nazwa części</label>
            <input type="text" name="name" value="<?= $data['part']->getName() ?>" required>
        </div>

        <div>
            <label for="description"></label>
            <textarea cols="30" rows="10" name="description"><?= $data['part']->getDescription() ?></textarea>
        </div>

        <div>
            <label for="price">Cena jednostkowa</label>
            <input type="number" name="price" min=0 step="0.1" value="<?= $data['part']->getPrice() ?>">
        </div>

        <button type="submit">Edytuj</button>
        <a href="<?= URL_ROOT . '/parts/' ?>">Wróć do listy części</a>
    </form>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>