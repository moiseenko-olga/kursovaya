<?php include __DIR__ . '/../header.php'; ?>

<div class="page-header">
    <h1>Актуальные сборки компьютеров</h1>
    <div class="sort-bar">
        <a href="/?sort=id" class="<?= $sort === 'id' ? 'active' : '' ?>">Новые</a>
        <a href="/?sort=price_asc" class="<?= $sort === 'price_asc' ? 'active' : '' ?>">Сначала дешевле</a>
        <a href="/?sort=price_desc" class="<?= $sort === 'price_desc' ? 'active' : '' ?>">Сначала дороже</a>
        <a href="/?sort=views" class="<?= $sort === 'views' ? 'active' : '' ?>">Популярные</a>
    </div>
</div>

<div class="builds-grid">
    <?php foreach ($builds as $b): ?>
        <div class="card">
            <div>
                <span class="badge"><?= htmlspecialchars($b['category']) ?></span>
                <h3><?= htmlspecialchars($b['title']) ?></h3>
                <ul class="specs-list">
                    <li><strong>CPU:</strong> <?= htmlspecialchars($b['cpu']) ?></li>
                    <li><strong>GPU:</strong> <?= htmlspecialchars($b['gpu']) ?></li>
                    <li><strong>RAM:</strong> <?= htmlspecialchars($b['ram']) ?></li>
                    <li><strong>SSD:</strong> <?= htmlspecialchars($b['storage']) ?></li>
                </ul>
            </div>
            <div class="card-footer">
                <span class="price"><?= number_format($b['price'], 0, '', ' ') ?> ₽</span>
                <a href="/builds/<?= $b['id'] ?>" class="btn">Подробнее</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include __DIR__ . '/../footer.php'; ?>
