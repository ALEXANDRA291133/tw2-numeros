<?php
$index = 0;
?>
<div class="card mt-4">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Resultados</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Índice</th>
                    <th>Número aleatorio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($numbers as $num): ?>
                <tr>
                    <td><?php echo htmlspecialchars($index, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($num, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <?php $index++; endforeach; ?>
            </tbody>
            <tfoot class="table-success">
                <tr>
                    <td><strong>Suma</strong></td>
                    <td><?php echo htmlspecialchars($stats['sum'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Promedio</strong></td>
                    <td><?php echo htmlspecialchars(number_format($stats['average'], 2), ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Mínimo</strong></td>
                    <td><?php echo htmlspecialchars($stats['min'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Máximo</strong></td>
                    <td><?php echo htmlspecialchars($stats['max'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
