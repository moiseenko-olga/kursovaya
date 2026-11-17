<?php

class Db
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/pc_portal.sqlite');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $this->initTables();
    }

    public function query(string $sql, array $params = []): array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return [];
        }

        return $sth->fetchAll();
    }

    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->pdo->prepare($sql);
        return $sth->execute($params);
    }

    private function initTables()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nickname TEXT NOT NULL,
            role TEXT DEFAULT 'Энтузиаст'
        )");

        $this->pdo->exec("CREATE TABLE IF NOT EXISTS builds (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            author_id INTEGER NOT NULL,
            title TEXT NOT NULL,
            category TEXT NOT NULL,
            cpu TEXT NOT NULL,
            gpu TEXT NOT NULL,
            ram TEXT NOT NULL,
            storage TEXT NOT NULL,
            price INTEGER NOT NULL,
            views INTEGER DEFAULT 0,
            description TEXT NOT NULL,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        )");

        $count = $this->pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
        if ((int)$count === 0) {
            $this->pdo->exec("INSERT INTO users (nickname, role) VALUES 
                ('TechMaster', 'Главный редактор'),
                ('HardwareGuru', 'Сборщик ПК')
            ");

            $this->pdo->exec("INSERT INTO builds (author_id, title, category, cpu, gpu, ram, storage, price, views, description) VALUES 
                (1, 'Оптимальный игровой FullHD 2026', 'Игровой', 'AMD Ryzen 5 7500F', 'NVIDIA GeForce RTX 4060 8GB', '32 ГБ DDR5 6000 МГц', '1 ТБ NVMe SSD PCIe 4.0', 98500, 142, 'Сбалансированная сборка для комфортного гейминга в разрешении 1080p на высоких и ультра настройках с запасом под будущий апгрейд.'),
                (2, 'Рабочая станция для монтажа и 3D', 'Рабочий', 'Intel Core i7-14700K', 'NVIDIA GeForce RTX 4070 Super 12GB', '64 ГБ DDR5 5600 МГц', '2 ТБ NVMe SSD + 4 ТБ HDD', 189000, 89, 'Мощная конфигурация для рендеринга в Blender, монтажа видео в 4K и работы с нейросетями. Отличается тихой системой охлаждения.'),
                (1, 'Народный бюджетный ПК для учёбы и киберспорта', 'Бюджетный', 'Intel Core i3-12100F', 'AMD Radeon RX 6600 8GB', '16 ГБ DDR4 3200 МГц', '512 ГБ NVMe SSD', 56000, 215, 'Максимальная производительность за минимальные деньги. Отлично тянет CS2, Dota 2 и современные программы для разработки.')
            ");
        }
    }
}
