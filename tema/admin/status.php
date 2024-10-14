<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="status.css"> <!-- Link para o seu CSS -->
</head>

<body>

    <!-- Menu lateral -->
    <div class="wrapper">
        <!-- Menu lateral -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Fiscal Cidadão</h3>
            </div>
            <ul class="list-unstyled components">
                <li><a href="graficos.php">🏠 Início</a></li>
                <li><a href="status.php">📊 Status</a></li>
                <li><a href="notificacoes.php">🔔 Notificações</a></li>
                <li><a href="recompensas.php">🎁 Recompensas</a></li>
                <li><a href="perfil.php">👤 Perfil</a></li>
                <li><a href="configuracoes.php">⚙️ Configurações</a></li>
                <li><a href="ajuda.php">❓ Ajuda</a></li>
                <!-- Nova opção de Chamados -->
                <li><a href="chamados.php">📝 Chamados</a></li>
            </ul>
        </nav>
        <!-- Área de conteúdo -->
        <div id="content">
            <nav class="navbar">
                <button id="sidebarCollapse" class="btn btn-info">☰</button>

                <h2>Rede Social - Fiscal Cidadão</h2>
            </nav>

            <h1>Status</h1>

            <!-- Formulário para cadastro e edição -->
            <form method="POST" action="index.php?c=status&a=index">
                <input type="hidden" name="id" value="<?= isset($status) ? $status->id : ''; ?>">
                <input type="hidden" name="acao" value="<?= isset($status) ? 'atualizar' : 'cadastrar'; ?>">

                <label for="chamado_id">Chamado ID:</label>
                <input type="number" name="chamado_id" required
                    value="<?= isset($status) ? $status->chamado_id : ''; ?>">

                <label for="status_anterior">Status Anterior:</label>
                <select name="status_anterior" required>
                    <option value="aberto"
                        <?= isset($status) && $status->status_anterior === 'aberto' ? 'selected' : ''; ?>>
                        Aberto</option>
                    <option value="em_andamento"
                        <?= isset($status) && $status->status_anterior === 'em_andamento' ? 'selected' : ''; ?>>Em
                        Andamento
                    </option>
                    <option value="resolvido"
                        <?= isset($status) && $status->status_anterior === 'resolvido' ? 'selected' : ''; ?>>Resolvido
                    </option>
                </select>

                <label for="status_atual">Status Atual:</label>
                <select name="status_atual" required>
                    <option value="aberto"
                        <?= isset($status) && $status->status_atual === 'aberto' ? 'selected' : ''; ?>>
                        Aberto
                    </option>
                    <option value="em_andamento"
                        <?= isset($status) && $status->status_atual === 'em_andamento' ? 'selected' : ''; ?>>Em
                        Andamento
                    </option>
                    <option value="resolvido"
                        <?= isset($status) && $status->status_atual === 'resolvido' ? 'selected' : ''; ?>>
                        Resolvido</option>
                </select>

                <button type="submit"><?= isset($status) ? 'Atualizar Status' : 'Cadastrar Status'; ?></button>
            </form>

            <!-- Tabela para listar todos os status -->
            <h2>Lista de Status</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chamado ID</th>
                        <th>Status Anterior</th>
                        <th>Status Atual</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($statusList): ?>
                        <?php foreach ($statusList as $status): ?>
                            <tr>
                                <td><?= $status['id']; ?></td>
                                <td><?= $status['chamado_id']; ?></td>
                                <td><?= $status['status_anterior']; ?></td>
                                <td><?= $status['status_atual']; ?></td>
                                <td>
                                    <a href="index.php?c=status&a=index&id=<?= $status['id']; ?>">Editar</a>
                                    <a href="index.php?c=status&a=deletar&id=<?= $status['id']; ?>">Deletar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Nenhum status encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Aqui você pode incluir um script para controlar a animação do menu lateral -->
        <script>
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
            });
        </script>
</body>

</html>