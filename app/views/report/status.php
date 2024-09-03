<?php include_once '../app/views/layout/header.php'; ?>
<h2>Status das Reclamações</h2>
<ul>
    <?php foreach ($data['reports'] as $report) : ?>
        <li>
            <strong><?= $report['description']; ?></strong> - 
            <em><?= $report['location']; ?></em> - 
            Status: <?= $report['status']; ?>
            <a href="/report/view/<?= $report['id']; ?>">Ver Detalhes</a>
        </li>
    <?php endforeach; ?>
</ul>
<?php include_once '../app/views/layout/footer.php'; ?>
