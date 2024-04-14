<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <form action="<?= URL_ROOT . '/parts/create' ?>" method="post">
        <div>
            <label for="number">Numer części</label>
            <input type="text" name="number" required>
        </div>

        <div>
            <label for="name">Nazwa części</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label for="description"></label>
            <textarea cols="30" rows="10" name="description"></textarea>
        </div>

        <div>
            <label for="price">Cena jednostkowa</label>
            <input type="number" name="price" min=0 step="0.1">
        </div>

        <button type="submit">Dodaj</button>
    </form>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>