<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Moderno - Fiscal Cidadão</title>
    <link rel="stylesheet" href="dash.css">
    <style>
    /* Adicionei alguns estilos para melhorar a aparência do dashboard */
    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 20px;
    }

    .numbers {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .icon-shape {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
    }

    #sidebar ul li a:hover {
        background-color: #ccc;
        color: #fff;
        transition: 0.3s;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Menu lateral retrátil -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3>Fiscal Cidadão</h3>
                <button id="sidebarCollapse" class="btn btn-info">☰</button>
            </div>
            <ul class="list-unstyled components">
                <li><a href="dashboard.php">🏠 Início</a></li>
                <li><a href="status.php">📊 Status</a></li>
                <li><a href="notificacoes.php">🔔 Notificações</a></li>
                <li><a href="recompensas.php">🎁 Recompensas</a></li>
                <li><a href="perfil.php">👤 Perfil</a></li>
                <li><a href="configuracoes.php">⚙️ Configurações</a></li>
                <li><a href="ajuda.php">❓ Ajuda</a></li>
                <li><a href="chamados.php">📝 Chamados</a></li>
            </ul>
        </nav>

        <!-- Área de conteúdo principal -->
        <div id="content">
            <div class="navbar">
                <h2>Rede Social - Fiscal Cidadão</h2>
            </div>

            <!-- Seção principal com posts da comunidade -->
            <div class="dashboard-content">
                <div class="community-updates">
                    <h3>💬 Atualizações da Comunidade</h3>
                    <div class="community-post">
                        <p><strong>Maria Souza:</strong> Alguém sabe se a coleta de lixo foi regularizada na Rua A?</p>
                    </div>
                    <div class="community-post">
                        <p><strong>João Silva:</strong> Relatei um buraco na rua e ele foi consertado em menos de uma
                            semana! Excelente trabalho!</p>
                    </div>
                    <!-- Adicione mais posts -->
                </div>

                <!-- Gráficos de soluções -->
                <div class="dashboard-section">
                    <h3>📈 Gráficos de Soluções</h3>
                    <div class="chart-container">
                        <canvas id="solutionsChart"></canvas>
                    </div>
                </div>

                <!-- Adicionei uma nova seção com gráficos e números -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Problemas
                                                resolvidos</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                500
                                                <span class="text-success text-sm font-weight-bolder">+20%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity- 10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Usuários ativos</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                1000
                                                <span class="text-success text-sm font-weight-bolder">+15%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Posts da comunidade
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                200
                                                <span class="text-success text-sm font-weight-bolder">+10%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script>
    // Adicionei um script para criar um gráfico de soluções
    var ctx = document.getElementById("solutionsChart").getContext("2d");
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Soluções",
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1
            }]
        },
        options: {
            title: {
                display: true,
                text: "Soluções por mês"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</body>

</html>