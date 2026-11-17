<?php include __DIR__ . '/../header.php'; ?>

<div class="form-box">
    <h1 style="margin-bottom: 20px;">Добавление новой сборки ПК</h1>
    <form method="post">
        <div class="form-group">
            <label>Автор сборки</label>
            <select name="author_id">
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['nickname']) ?> (<?= htmlspecialchars($u['role']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group"><label>Название сборки</label><input type="text" name="title" required placeholder="Например: Ультра-ПК для 4K"></div>
        <div class="form-group">
            <label>Категория</label>
            <select name="category">
                <option value="Игровой">Игровой</option>
                <option value="Рабочий">Рабочий</option>
                <option value="Бюджетный">Бюджетный</option>
            </select>
        </div>
        <div class="form-group"><label>Процессор</label><input type="text" name="cpu" required placeholder="AMD Ryzen 7 7800X3D"></div>
        <div class="form-group"><label>Видеокарта</label><input type="text" name="gpu" required placeholder="NVIDIA GeForce RTX 4080"></div>
        <div class="form-group"><label>Оперативная память</label><input type="text" name="ram" required placeholder="32 ГБ DDR5 6000 МГц"></div>
        <div class="form-group"><label>Накопитель</label><input type="text" name="storage" required placeholder="2 ТБ NVMe SSD"></div>
        <div class="form-group"><label>Итоговая стоимость (₽)</label><input type="number" name="price" required placeholder="150000"></div>
        <div class="form-group"><label>Обзор и описание</label><textarea name="description" rows="4" required placeholder="Опишите преимущества конфигурации..."></textarea></div>
        <button type="submit" class="btn">Сохранить сборку</button>
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
