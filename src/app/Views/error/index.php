
<h1>Errors:</h1>
<?php foreach ($data['errors'] as $error): ?>
    <p><?= $error->getMessage(); ?></p>
<?php endforeach ?>
