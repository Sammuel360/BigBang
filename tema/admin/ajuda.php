<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajuda.css">
    <title>Fiscal Cidadão - Manual de Usuário</title>
</head>

<body>
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

    <header>
        <h1>Fiscal Cidadão</h1>
        <p>Relate problemas urbanos com facilidade!</p>
    </header>

    <main>
        <button id="ajudaBtn">Ajuda</button>

        <div id="ajudaModal" class="modal">
            <div class="modal-content">
                <nav class="navbar">
                    <button id="sidebarCollapse" class="btn btn-info">☰</button>

                    <h2>Rede Social - Fiscal Cidadão</h2>
                </nav>
                <span class="close">&times;</span>
                <h2>Manual de Usuário</h2>
                <p>
                    <!-- Editar esta parte para fornecer informações básicas sobre o site -->
                    Este site permite que cidadãos relatem problemas como infraestrutura, iluminação e outros.
                    <br><br>
                    Passos para relatar um problema:
                <ol>
                    <li>Selecione o tipo de problema que deseja relatar.</li>
                    <li>Preencha o formulário com as informações necessárias.</li>
                    <li>Clique em "Enviar" para enviar sua denúncia.</li>
                </ol>
                </p>
                <h2>Requisitos</h2>
                <p>
                    * Acesso à internet
                    <br>
                    * Navegador web moderno (Google Chrome, Mozilla Firefox, etc.)
                </p>
                <h2>Passos para relatar um problema</h2>
                <ol>
                    <li>Selecione o tipo de problema: Escolha o tipo de problema que você deseja relatar, como
                        infraestrutura, iluminação, etc.</li>
                    <li>Preencha o formulário: Preencha o formulário com as informações necessárias, como localização,
                        descrição do problema, etc.</li>
                    <li>Clique em "Enviar": Clique no botão "Enviar" para enviar sua denúncia.</li>
                </ol>
                <h2>Funcionalidades</h2>
                <p>
                    * Modal de Ajuda: Clique no botão "Ajuda" para abrir o modal de ajuda, que contém informações
                    básicas sobre o site e passos para relatar um problema.
                    <br>
                    * Formulário de Relato: Preencha o formulário com as informações necessárias para relatar um
                    problema.
                    <br>
                    * Envio de Denúncia: Clique no botão "Enviar" para enviar sua denúncia.
                </p>
                <h2>Dicas e Sugestões</h2>
                <p>
                    * Certifique-se de preencher todos os campos obrigatórios do formulário.
                    <br>
                    * Forneça informações detalhadas e precisas sobre o problema.
                    <br>
                    * Verifique se o problema já foi relatado anteriormente.
                </p>
                <h2>Perguntas Frequentes</h2>
                <p>
                    * Como faço para relatar um problema?: Siga os passos descritos acima.
                    <br>
                    * O que acontece após enviar minha denúncia?: Sua denúncia será enviada para a prefeitura e será
                    analisada por nossos funcionários.
                    <br>
                    * Como posso acompanhar o status da minha denúncia?: Você receberá um e-mail com o status da sua
                    denúncia.
                </p>
                <h2>Contato</h2>
                <p>
                    * E-mail: <a href="mailto:fiscal.cidadão@example.com">fiscal.cidadão@example.com</a>
                    <br>
                    * Telefone: 11 1234-5678
                    <br>
                    * Endereço: Prefeitura Municipal, do seu estado
                </p>
                <h2>Termos e Condições</h2>
                <p>
                    * Ao utilizar o sistema, você concorda com os termos e condições de uso.
                    <br>
                    * O sistema não é responsável por erros ou omissões nos relatos de problemas.
                    <br>
                    * O sistema não será oferecido em tempo real.
                    <br>
                    * O sistema não sera utilizado para poder fazer denuncias focadas a outros cidades com itenção de o
                    prejudicar, em casos graves ligue para a policia no 190 da sua reg ião
                </p>
                <h2>Créditos</h2>
                <p>
                    * Desenvolvido por Joao da Fiscal Cidadão
                    <br>
                    * Copyright 2024 Fiscal Cidadão. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Fiscal Cidadão. Todos os direitos reservados.</p>
    </footer>

    <script>
    // Função para abrir e fechar o modal de ajuda
    const ajudaBtn = document.getElementById("ajudaBtn");
    const ajudaModal = document.getElementById("ajudaModal");
    const closeBtn = document.getElementsByClassName("close")[0];

    ajudaBtn.onclick = function() {
        ajudaModal.style.display = "block";
    }

    closeBtn.onclick = function() {
        ajudaModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === ajudaModal) {
            ajudaModal.style.display = "none";
        }
    }
    </script>

</body>


</html>