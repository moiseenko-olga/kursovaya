<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'PC Portal') ?></title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<header class="header">
    <a href="/" class="logo">⚡ PC Configurator</a>
    <nav class="nav">
        <a href="/">Каталог сборок</a>
        <a href="/calculator">Калькулятор ПК</a>
        <a href="/builds/add">+ Добавить сборку</a>
    </nav>
</header>
<main class="container">
