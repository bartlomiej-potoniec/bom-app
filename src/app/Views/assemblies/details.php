<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <h2>Szczegóły dla <?= $data['assemblyParts']->getAssembly()->getName() ?></h2>

    <table>
        <thead>
            <tr>
                <th>Numer części</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena jednostkowa</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['assemblyParts']->getParts() as $part): ?>
                <tr>
                    <td><a href="#"><?= $part->getNumber() ?></a></td>
                    <td><?= $part->getName() ?></td>
                    <td><?= $part->getDescription() === null ? 'Brak opisu' : $part->getDescription() ?></td>
                    <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                    <td>
                        <a href="#" class="delete-link">Usuń</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>