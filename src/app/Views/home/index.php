<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <table>
        <thead>
            <tr>
                <th>Numer złożenia</th>
                <th>Nazwa</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['assemblies'] as $assembly): ?>
                <tr>
                    <td><a href="<?= URL_ROOT . '/assemblies/details/' . $assembly->getId() ?>"><?= $assembly->getNumber() ?></a></td>
                    <td><?= $assembly->getName() ?></td>
                    <td><?= $assembly->getDescription() ?></td>
                    <td>
                        <a href="<?= URL_ROOT . '/assemblies/details/' . $assembly->getId() ?>">Szczegóły</a>
                        <a href="<?= URL_ROOT . '/assemblies/edit/' . $assembly->getId() ?>">Edytuj</a>
                        <a href="<?= URL_ROOT . '/assemblies/delete/' . $assembly->getId() ?>" data-id="<?= $assembly->getId() ?>" class="delete-link">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>