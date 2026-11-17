<?php include __DIR__ . '/../header.php'; ?>

<div class="form-box">
    <h1 style="margin-bottom: 10px;">Калькулятор сборки ПК</h1>
    <p style="color: #64748b; margin-bottom: 20px;">Выберите комплектующие для расчёта итоговой стоимости и подбора блока питания.</p>

    <form method="post">
        <div class="form-group">
            <label>Процессор</label>
            <select name="cpu">
                <option value="11000">Intel Core i3-12100F (11 000 ₽)</option>
                <option value="18500">AMD Ryzen 5 7500F (18 500 ₽)</option>
                <option value="39000">Intel Core i7-14700K (39 000 ₽)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Видеокарта</label>
            <select name="gpu">
                <option value="24000">AMD Radeon RX 6600 8GB (24 000 ₽)</option>
                <option value="36000">NVIDIA GeForce RTX 4060 8GB (36 000 ₽)</option>
                <option value="68000">NVIDIA GeForce RTX 4070 Super 12GB (68 000 ₽)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Оперативная память</label>
            <select name="ram">
                <option value="4500">16 ГБ DDR4 (4 500 ₽)</option>
                <option value="11500">32 ГБ DDR5 (11 500 ₽)</option>
                <option value="22000">64 ГБ DDR5 (22 000 ₽)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Накопитель SSD</label>
            <select name="ssd">
                <option value="4500">512 ГБ NVMe (4 500 ₽)</option>
                <option value="8000">1 ТБ NVMe (8 000 ₽)</option>
                <option value="15500">2 ТБ NVMe (15 500 ₽)</option>
            </select>
        </div>
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 8px; font-weight: normal; cursor: pointer;">
                <input type="checkbox" name="assembly" style="width: auto;"> Профессиональная сборка и тестирование (+3 500 ₽)
            </label>
        </div>
        <button type="submit" class="btn">Рассчитать конфигурацию</button>
    </form>

    <?php if ($result !== null): ?>
        <div class="calc-result">
            <h3>Результат расчёта:</h3>
            <p style="margin-top: 8px; font-size: 18px;">Ориентировочная стоимость ПК (с учётом корпуса и материнской платы): <strong><?= number_format($result['totalPrice'], 0, '', ' ') ?> ₽</strong></p>
            <p style="margin-top: 6px;">Рекомендуемая мощность блока питания: <strong>не менее <?= $result['psuWatt'] ?> Вт</strong></p>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
