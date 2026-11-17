<?php include __DIR__ . '/../header.php'; ?>

<div class="form-box">
    <h1 style="margin-bottom: 20px;">Редактирование сборки</h1>
    <form method="post">
        <div class="form-group"><label>Название сборки</label><input type="text" name="title" value="<?= htmlspecialchars($build['title']) ?>" required></div>
        <div class="form-group">
            <label>Категория</label>
            <select name="category">
                <option value="<?= htmlspecialchars($build['category']) ?>"><?= htmlspecialchars($build['category']) ?></option>
                <option value="Игровой">Игровой</option>
                <option value="Рабочий">Рабочий</option>
                <option value="Бюджетный">Бюджетный</option>
            </select>
        </div>
        <div class="form-group"><label>Процессор</label><input type="text" name="cpu" value="<?= htmlspecialchars($build['cpu']) ?>" required></div>
        <div class="form-group"><label>Видеокарта</label><input type="text" name="gpu" value="<?= htmlspecialchars($build['gpu']) ?>" required></div>
        <div class="form-group"><label>Оперативная память</label><input type="text" name="ram" value="<?= htmlspecialchars($build['ram']) ?>" required></div>
        <div class="form-group"><label>Накопитель</label><input type="text" name="storage" value="<?= htmlspecialchars($build['storage']) ?>" required></div>
        <div class="form-group"><label>Итоговая стоимость (₽)</label><input type="number" name="price" value="<?= (int)$build['price'] ?>" required></div>
        <div class="form-group"><label>Обзор и описание</label><textarea name="description" rows="4" required><?= htmlspecialchars($build['description']) ?></textarea></div>
        <button type="submit" class="btn">Сохранить изменения</button>
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
