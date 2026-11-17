<?php include __DIR__ . '/../header.php'; ?>

<div class="detail-box">
    <span class="badge"><?= htmlspecialchars($build['category']) ?></span>
    <h1><?= htmlspecialchars($build['title']) ?></h1>
    <div class="detail-meta">
        <span>👤 Автор: <strong><?= htmlspecialchars($author['nickname']) ?></strong> (<?= htmlspecialchars($author['role']) ?>)</span>
        <span>👁 Просмотров: <strong><?= (int)$build['views'] ?></strong></span>
        <span>💰 Итоговая цена: <strong><?= number_format($build['price'], 0, '', ' ') ?> ₽</strong></span>
    </div>

    <p style="line-height: 1.6;"><?= nl2br(htmlspecialchars($build['description'])) ?></p>

    <table class="specs-table">
        <tr><th>Процессор (CPU)</th><td><?= htmlspecialchars($build['cpu']) ?></td></tr>
        <tr><th>Видеокарта (GPU)</th><td><?= htmlspecialchars($build['gpu']) ?></td></tr>
        <tr><th>Оперативная память (RAM)</th><td><?= htmlspecialchars($build['ram']) ?></td></tr>
        <tr><th>Накопитель (SSD/HDD)</th><td><?= htmlspecialchars($build['storage']) ?></td></tr>
    </table>

    <div style="display: flex; gap: 10px; margin-top: 20px;">
        <a href="/" class="btn">← Назад в каталог</a>
        <a href="/builds/<?= $build['id'] ?>/edit" class="btn btn-warning">Редактировать сборку</a>
        <a href="/builds/<?= $build['id'] ?>/delete" class="btn btn-danger" onclick="return confirm('Удалить эту сборку?')">Удалить</a>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
