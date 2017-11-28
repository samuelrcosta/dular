<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
<div class="container main">
    <h1>Dashboard</h1>
    <div class="grafico graficoAcessos" style="max-width: 700px">
        <h2 style="margin-bottom: 10px">Gráfico de acessos</h2>
        <canvas id="graficoAcessos"></canvas>
    </div>
    <div class="grafico graficoAcessoProdutosCama" style="margin-top: 40px;max-width: 700px">
        <h2 style="margin-bottom: 10px">Produtos de Cama mais visitados</h2>
        <canvas id="graficoAcessosProdutosCama"></canvas>
    </div>
    <div class="grafico graficoAcessoProdutosMesa" style="margin-top: 40px;max-width: 700px">
        <h2 style="margin-bottom: 10px">Produtos de Mesa mais visitados</h2>
        <canvas id="graficoAcessosProdutosMesa"></canvas>
    </div>
    <div class="grafico graficoAcessoProdutosBanho" style="margin-top: 40px;max-width: 700px">
        <h2 style="margin-bottom: 10px">Produtos de Banho mais visitados</h2>
        <canvas id="graficoAcessosProdutosBanho"></canvas>
    </div>
    <div class="grafico graficoProdutosOrcamentos" style="margin-top: 40px;max-width: 700px">
        <h2 style="margin-bottom: 10px">Produtos mais Orçamentados</h2>
        <canvas id="graficoProdutosOrcamentos"></canvas>
    </div>
</div>
<script>
    var barChartData = {
        labels: ['Total', <?php foreach ($paginas as $pagina) echo "'$pagina',"?>],
        datasets: [{
            label: 'Acessos Totais',
            backgroundColor: "rgba(255, 97, 3, 0.7)",
            borderColor: "rgba(255, 97, 3, 0.7)",
            borderWidth: 1,
            data: [
                <?php echo count($totalAcessos) ?>,
                <?php foreach ($acessosPorPagina as $acesso) echo $acesso['acessos'].","?>
            ]
        }, {
            label: 'Acessos por Ip',
            backgroundColor: "rgba(30, 144, 255, 0.7)",
            borderColor: "rgba(30, 144, 255, 0.7)",
            borderWidth: 1,
            data: [
                <?php echo count($acessosPorIp) ?>,
                <?php foreach ($acessosPorIpPorPagina as $acesso) echo $acesso.","?>
            ]
        }]

    };

    var dataGraficoProdutosCama = {
        labels: [<?php foreach ($acessosProdutosPorPaginaCama as $produto) echo "'".$produto['nome']."',"?>],
        datasets: [{
            label: 'Visitas Totais',
            backgroundColor: "rgba(255, 97, 3, 0.7)",
            borderColor: "rgba(255, 97, 3, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorPaginaCama as $acesso) echo $acesso['acessos'].","?>
            ]
        }, {
            label: 'Visitas por Ip',
            backgroundColor: "rgba(30, 144, 255, 0.7)",
            borderColor: "rgba(30, 144, 255, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorIpPorPaginaCama as $acesso) echo $acesso.","?>
            ]
        }]

    };

    var dataGraficoProdutosMesa = {
        labels: [<?php foreach ($acessosProdutosPorPaginaMesa as $produto) echo "'".$produto['nome']."',"?>],
        datasets: [{
            label: 'Visitas Totais',
            backgroundColor: "rgba(255, 97, 3, 0.7)",
            borderColor: "rgba(255, 97, 3, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorPaginaMesa as $acesso) echo $acesso['acessos'].","?>
            ]
        }, {
            label: 'Visitas por Ip',
            backgroundColor: "rgba(30, 144, 255, 0.7)",
            borderColor: "rgba(30, 144, 255, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorIpPorPaginaMesa as $acesso) echo $acesso.","?>
            ]
        }]

    };

    var dataGraficoProdutosBanho = {
        labels: [<?php foreach ($acessosProdutosPorPaginaBanho as $produto) echo "'".$produto['nome']."',"?>],
        datasets: [{
            label: 'Visitas Totais',
            backgroundColor: "rgba(255, 97, 3, 0.7)",
            borderColor: "rgba(255, 97, 3, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorPaginaBanho as $acesso) echo $acesso['acessos'].","?>
            ]
        }, {
            label: 'Visitas por Ip',
            backgroundColor: "rgba(30, 144, 255, 0.7)",
            borderColor: "rgba(30, 144, 255, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($acessosProdutosPorIpPorPaginaBanho as $acesso) echo $acesso.","?>
            ]
        }]

    };

    var dataGraficoProdutosOrcamentos = {
        labels: [<?php foreach ($prodsOrcamentos as $produto) echo "'$produto',"?>],
        datasets: [{
            label: 'Orçamentos Feitos',
            backgroundColor: "rgba(255, 97, 3, 0.7)",
            borderColor: "rgba(255, 97, 3, 0.7)",
            borderWidth: 1,
            data: [
                <?php foreach ($produtosOrcamentados as $produto) echo $produto['QuantidadeOrcamentos'].","?>
            ]
            },
            {
                label: 'Quantidade Vendida',
                backgroundColor: "rgba(30, 144, 255, 0.7)",
                borderColor: "rgba(30, 144, 255, 0.7)",
                borderWidth: 1,
                data: [
                    <?php foreach ($produtosOrcamentados as $produto) echo $produto['quantidade'].","?>
                ]
            }
        ]
    };

    var options =  {
        responsive: true,
        legend: {
            position: 'top',
        },
    }

    var ctx = document.getElementById("graficoAcessos").getContext("2d");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: options
    });

    var graficoAcessosProdutosCama = document.getElementById("graficoAcessosProdutosCama").getContext("2d");
    var myBarChart = new Chart(graficoAcessosProdutosCama, {
        type: 'bar',
        data: dataGraficoProdutosCama,
        options: options
    });

    var graficoAcessosProdutosMesa = document.getElementById("graficoAcessosProdutosMesa").getContext("2d");
    var myBarChart = new Chart(graficoAcessosProdutosMesa, {
        type: 'bar',
        data: dataGraficoProdutosMesa,
        options: options
    });

    var graficoAcessosProdutosBanho = document.getElementById("graficoAcessosProdutosBanho").getContext("2d");
    var myBarChart = new Chart(graficoAcessosProdutosBanho, {
        type: 'bar',
        data: dataGraficoProdutosBanho,
        options: options
    });

    var graficoProdutosOrcamentados = document.getElementById("graficoProdutosOrcamentos").getContext("2d");
    var myBarChart = new Chart(graficoProdutosOrcamentados, {
        type: 'bar',
        data: dataGraficoProdutosOrcamentos,
        options: options
    });
</script>