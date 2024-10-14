<?php
require __DIR__ . '/../../Source/Models/StatusModel.php';  // Ajuste o caminho conforme necessário

use Source\Models\StatusModel;

// Inicializar a variável $status
$status = [];

// Instanciar o modelo StatusModel
$statusModel = new StatusModel();

// Buscar todos os status
$status = $statusModel->list();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Status</title>
    <link rel="stylesheet" href="listStatus.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Lista de Status</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chamado ID</th>
                        <th>Status Anterior</th>
                        <th>Status Atual</th>
                        <th>Data/Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($status)): ?>
                    <?php foreach ($status as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['chamado_id'] ?></td>
                        <td><?= $row['status_anterior'] ?></td>
                        <td><?= $row['status_atual'] ?></td>
                        <td><?= $row['data_hora'] ?></td>
                        <td><button onclick="openPopup('<?= $row['id'] ?>')">Ver Andamento</button></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum status encontrado.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>
        <footer>
            <p>&copy; 2024 Meu Site. Todos os direitos reservados.</p>
        </footer>
    </div>

    <!-- Pop-up -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Andamento do Status</h2>
            <p id="popup-status"></p>
        </div>
    </div>

    <script>
    function openPopup(statusId) {
        // Simular o conteúdo do andamento para exibição
        document.getElementById('popup-status').innerText = "Exibindo andamento do status ID: " + statusId;
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
    </script>
</body>

</html>