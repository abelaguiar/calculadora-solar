<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculadora Solar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <?php
        $estadosCidades = [
            1   => 'Ceará (CE) - Fortaleza', 
            2   => 'Maranhão (MA) - São Luís', 
            3   => 'Piauí (PI) - Teresina',
            4   => 'Rio Grande do Norte (RN - Natal', 
            5   => 'Paraíba (PB) - João Pessoa', 
            6   => 'Pernambuco (PE) - Recife', 
            7   => 'Alagoas (AL) - Maceió',
            8   => 'Sergipe (SE) - Aracaju', 
            9   => 'Bahia (BA) - Salvador', 
            10  => 'Amazonas (AM) - Manaus', 
            11  => 'Roraima (RR) - Boa Vista',
            12  => 'Amapá (AP) - Macapá', 
            13  => 'Pará (PA) - Belém', 
            14  => 'Tocantins (TO) - Palmas', 
            15  => 'Rondônia (RO) - Porto Velho',
            16  => 'Acre (AC) - Rio Branco', 
            17  => 'Distrito Federal (DF) - Brasília', 
            18  => 'Goiás (GO) - Goiânia', 
            19  => 'Mato Grosso (MT) - Cuiabá',
            21  => 'Mato Grosso do Sul (MS) - Campo Grande', 
            22  => 'São Paulo (SP) - São Paulo', 
            23  => 'Rio de Janeiro (RJ) - Rio de Janeiro', 
            24  => 'Espírito Santo (ES) - Vitória', 
            25  => 'Minas Gerais (MG) - Belo Horizonte', 
            26  => 'Paraná (PR) - Curitiba', 
            27  => 'Rio Grande do Sul (RS) - Porto Alegre', 
            28  => 'Santa Catarina (SC) - Florianópolis'
        ];
    ?>
    <div class="d-flex justify-content-center mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Calculadora Solar</h5>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Estado ou Cidade</label>
                        <br>
                        <select name="estado_cidade" class="form-control select2" required>
                            <option value="">Selecione</option>
                            <?php foreach ($estadosCidades as $id => $nome): ?>
                                <option value="<?= $id; ?>" <?= !empty($_POST['estado_cidade']) && $_POST['estado_cidade'] == $id ? 'selected' : ''; ?>>
                                    <?= $nome; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-muted">Selecione um estado com cidade</small>
                    </div>
                    <div class="form-group">
                        <label for="">Valor de Conta em Reais</label>
                        <input type="text" name="valor_conta" id="valor_conta" class="form-control" value="<?= !empty($_POST['valor_conta']) ? $_POST['valor_conta'] : ''; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Calcular
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Resultado</h5>
                <?php
                    if (!empty($_POST)) {

                        $tabelaGeral = [
                            1   => ['hsp' => 5.6 , 'valor_tarifa' => 0.69],
                            2   => ['hsp' => 5.04, 'valor_tarifa' => 0.88],
                            3   => ['hsp' => 5.54, 'valor_tarifa' => 0.82],
                            4   => ['hsp' => 5.66, 'valor_tarifa' => 0.67], 
                            5   => ['hsp' => 5.51, 'valor_tarifa' => 0.64],
                            6   => ['hsp' => 5.46, 'valor_tarifa' => 0.73],
                            7   => ['hsp' => 5.22, 'valor_tarifa' => 0.71],
                            8   => ['hsp' => 5.50, 'valor_tarifa' => 0.69],
                            9   => ['hsp' => 5.36, 'valor_tarifa' => 0.75],
                            10  => ['hsp' => 4.42, 'valor_tarifa' => 0.84], 
                            11  => ['hsp' => 4.54, 'valor_tarifa' => 0.78], 
                            12  => ['hsp' => 4.87, 'valor_tarifa' => 0.79], 
                            13  => ['hsp' => 4.86, 'valor_tarifa' => 0.87], 
                            14  => ['hsp' => 5.17, 'valor_tarifa' => 0.83], 
                            15  => ['hsp' => 4.48, 'valor_tarifa' => 0.71], 
                            16  => ['hsp' => 4.56, 'valor_tarifa' => 0.82], 
                            17  => ['hsp' => 5.25, 'valor_tarifa' => 0.63], 
                            18  => ['hsp' => 5.26, 'valor_tarifa' => 0.64], 
                            19  => ['hsp' => 5.11, 'valor_tarifa' => 0.80], 
                            21  => ['hsp' => 5.0 , 'valor_tarifa' => 0.73],
                            22  => ['hsp' => 4.42, 'valor_tarifa' => 0.60],
                            23  => ['hsp' => 4.70, 'valor_tarifa' => 0.81],
                            24  => ['hsp' => 4.96, 'valor_tarifa' => 0.66],
                            25  => ['hsp' => 5.13, 'valor_tarifa' => 0.77],
                            26  => ['hsp' => 4.20, 'valor_tarifa' => 0.60],
                            27  => ['hsp' => 4.38, 'valor_tarifa' => 0.50], 
                            28  => ['hsp' => 4.25, 'valor_tarifa' => 0.44]
                        ];

                    if(!function_exists('ceiling') )
                    {
                        function ceiling($number, $significance = 1)
                        {
                            return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
                        }
                    }

                    $estadoCidadeId = $_POST['estado_cidade'];
                    //$formataValorConta = str_replace('.', '', $_POST['valor_conta']);
                    $valorConta = $_POST['valor_conta'];

                    $valorTarifa = $tabelaGeral[$estadoCidadeId]['valor_tarifa'];
                    $hsp = $tabelaGeral[$estadoCidadeId]['hsp'];

                    // ** Tarifa / Valor Conta = Killowatts consumidos no mês
                    // ** Killowatts consumidos no mês / 30 = Killowatts consumidos por dia

                    $killowattsConsulmidosMes =  $valorConta / $valorTarifa;
                    $killowattsConsulmidosDia = $killowattsConsulmidosMes / 30;

                    // ** Killowatts consumidos por dia / HSP de Estado/Cidade = KwP Bruto
                    // ** Arendondar valor apartir de uma função de KwP Bruto

                    $kwpBruto = $killowattsConsulmidosDia / $hsp;
                    $kwpBrutoArrendondado = round(ceiling($kwpBruto, 0.05), 1, PHP_ROUND_HALF_UP);

                    // ** KwP Bruto * 1000 / 330 = Quantidade de Placas
                    // ** Arrendondar valor apartir de uma função de Quantidade de Placas

                    $quantidadePlacas = ($kwpBruto * 1000) / 330;
                    $quantidadePlacasArrendondado = ceil($quantidadePlacas);

                    // ** Quantidade de Placas Arrendondado * 120% = Quantidade de Placas Final
                    // ** Arrendondar valor apartir de uma função de Quantidade de Placas Final

                    $quantidadePlacasFinal = $quantidadePlacasArrendondado * 1.20;
                    $quantidadePlacasFinalArrendondado = ceil($quantidadePlacasFinal);

                    // ** Quantidade de Placas Arrendondado * 2.03 = Metros quadrados de placas
                    // ** Arrendondar valor apartir de uma função de Metros quadrados de placas

                    $metrosQuadradosPlacas = $quantidadePlacasArrendondado * 2.03;
                    $metrosQuadradosPlacasArrendondado = ceil($metrosQuadradosPlacas);

                    // ** Quantidade de Placas Arrendondado Final * 2.03 = Metros quadrados de placas Final
                    // ** Arrendondar valor apartir de uma função de Metros quadrados de placas Final

                    $metrosQuadradosPlacasFinal = $quantidadePlacasFinalArrendondado * 2.03;
                    $metrosQuadradosPlacasFinalArrendondado = ceil($metrosQuadradosPlacasFinal);

                    // ** KwP Arrendondado * {HSP} / 30 = Produção Mensal
                    // ** Produção Mensal * 12 = Produção Anual

                    $producaoMensal = $kwpBrutoArrendondado * $hsp * 30; 
                    $producaoAnual = $producaoMensal * 12; 
                ?>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th colspan="2">Valores</th>
                                <th>Medidas</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> Tarifa Estimada</td>
                                <td class="bg-info text-white"><?= $valorTarifa; ?></td>
                                <td class="bg-info text-white"></td>
                                <td class="bg-success text-white">R$</td>
                            </tr>
                            <tr>
                                <td> Consumo  Mensal Estimado</td>
                                <td class="bg-info text-white"><?= round($killowattsConsulmidosMes, 1, PHP_ROUND_HALF_UP); ?></td>
                                <td class="bg-info text-white"></td>
                                <td class="bg-success text-white">kWh</td>
                            </tr>
                            <tr>
                                <td> Quantidade de Placas Estimada</td>
                                <td class="bg-info text-white"><?= $quantidadePlacasArrendondado; ?></td>
                                <td class="bg-info text-white"><?= $quantidadePlacasFinalArrendondado; ?></td>
                                <td class="bg-success text-white">Unidade</td>
                            </tr>
                            <tr>
                                <td> Área de Instalação Estimada</td>
                                <td class="bg-info text-white"><?= $metrosQuadradosPlacasArrendondado; ?></td>
                                <td class="bg-info text-white"><?= $metrosQuadradosPlacasFinalArrendondado; ?></td>
                                <td class="bg-success text-white">M2</td>
                            </tr>
                            <tr>
                                <td> Potencia Instalada Estimada</td>
                                <td class="bg-info text-white"><?= $kwpBrutoArrendondado; ?></td>
                                <td class="bg-info text-white"><?= $kwpBrutoArrendondado * 1.20; ?></td>
                                <td class="bg-success text-white">kWp</td>
                            </tr>
                            <tr>
                                <td> Geração mensal de Energia Estimada</td>
                                <td class="bg-info text-white"><?= round($producaoMensal, 2); ?></td>
                                <td class="bg-info text-white"><?= round(($producaoMensal * 1.20), 1, PHP_ROUND_HALF_UP); ?></td>
                                <td class="bg-success text-white">kWh</td>
                            </tr>
                            <tr>
                                <td> Geração Anual de Energia Estimada</td>
                                <td class="bg-info text-white"><?= round($producaoAnual, 2); ?></td>
                                <td class="bg-info text-white"><?= round(($producaoAnual * 1.20), 1, PHP_ROUND_HALF_UP); ?></td>
                                <td class="bg-success text-white">kWh</td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#valor_conta').mask("###0.00", {reverse: true});
        });
    </script>
</body>
</html>