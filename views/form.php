<?php
$nValue = isset($data['n']) ? $data['n'] : '';
$minValue = isset($data['min']) ? $data['min'] : '';
$maxValue = isset($data['max']) ? $data['max'] : '';
?>
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Generar Números Aleatorios</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="./index.php">
            <div class="mb-3">
                <label for="n" class="form-label">N (requerido)</label>
                <input type="number" class="form-control" id="n" name="n" value="<?php echo htmlspecialchars($nValue, ENT_QUOTES, 'UTF-8'); ?>" min="1" max="1000" required>
                <small class="form-text text-muted">Cantidad de números aleatorios (1-1000)</small>
            </div>
            <div class="mb-3">
                <label for="min" class="form-label">Mínimo</label>
                <input type="number" class="form-control" id="min" name="min" value="<?php echo htmlspecialchars($minValue, ENT_QUOTES, 'UTF-8'); ?>">
                <small class="form-text text-muted">Valor mínimo del rango (opcional)</small>
            </div>
            <div class="mb-3">
                <label for="max" class="form-label">Máximo</label>
                <input type="number" class="form-control" id="max" name="max" value="<?php echo htmlspecialchars($maxValue, ENT_QUOTES, 'UTF-8'); ?>">
                <small class="form-text text-muted">Valor máximo del rango (opcional)</small>
            </div>
            <button type="submit" class="btn btn-primary">Generar</button>
        </form>
    </div>
</div>
