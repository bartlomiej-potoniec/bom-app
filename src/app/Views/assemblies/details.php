<?php require_once APP_ROOT . '/Views/templates/header.php' ?>

    <h2>Szczegóły dla "<?= $data['assembly']->getName() ?>"</h2>

    <ul>
        <li>Numer części: <?= $data['assembly']->getNumber() ?></li>
        <li>Nazwa części: <?= $data['assembly']->getName() ?></li>
        <li>Pełny Opis: <?= $data['assembly']->getDescription() === null ? 'Brak opisu' : $data['assembly']->getDescription() ?></li>
    </ul>

    <?php if (!empty($data['assemblyParts'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Numer części</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Cena jednostkowa</th>
                    <th>Ilość</th>
                    <th>Suma</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['assemblyParts'] as $part): ?>
                    <tr>
                        <td><a href="<?= URL_ROOT . '/parts/details/' . $part->getId() ?>"><?= $part->getNumber() ?></a></td>
                        <td><?= $part->getName() ?></td>
                        <td><?= $part->getDescription() === null ? 'Brak opisu' : substr($part->getDescription(), 0, 40) . '...' ?></td>
                        <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                        <td><?= $part->getQuantity() ?></td>
                        <td><?= $part->getTotalCost() === null ? 'Brak ceny' : $part->getTotalCost() . 'zł.' ?></td>
                        <td>
                            <a href="<?= URL_ROOT . '/assemblies/increment/' . $data['assembly']->getId() . '/' . $part->getId() ?>">Zwiększ</a>
                            <a href="<?= URL_ROOT . '/assemblies/decrement/' . $data['assembly']->getId() . '/' . $part->getId() ?>">Zmniejsz</a>
                            <a href="<?= URL_ROOT . '/assemblies/unassign/' . $data['assembly']->getId() . '/' . $part->getId() ?>">Usuń</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>To złożenie nie zawiera żadnych części. Dodaj część wybierając z tabeli poniżej</p>
    <?php endif; ?>

    <hr>

    <h3>Dodaj część do złożenia</h3>

    <?php if (!empty($data['unasignedParts'])): ?>
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
                <?php foreach($data['unasignedParts'] as $part): ?>
                    <tr>
                        <td><a href="#"><?= $part->getNumber() ?></a></td>
                        <td><?= $part->getName() ?></td>
                        <td><?= $part->getDescription() === null ? 'Brak opisu' : substr($part->getDescription(), 0, 40) ?></td>
                        <td><?= $part->getPrice() === null ? 'Brak ceny' : $part->getPrice() . 'zł.' ?></td>
                        <td>
                            <a href="#">Dodaj do złożenia</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Twoje złożenie zawiera wszystkie części BOM lub w Twoim BOM nie ma jeszcze żadnych części. <a href="#">Dodaj nową część do BOM</a></p>
    <?php endif; ?>

<?php require_once APP_ROOT . '/Views/templates/footer.php' ?>