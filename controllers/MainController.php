<?php

class MainController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = new Db();
    }

    public function index()
    {
        $sort = $_GET['sort'] ?? 'id';
        $orderMap = [
            'id'         => 'id DESC',
            'price_asc'  => 'price ASC',
            'price_desc' => 'price DESC',
            'views'      => 'views DESC'
        ];
        $orderBy = $orderMap[$sort] ?? 'id DESC';

        $builds = $this->db->query("SELECT * FROM builds ORDER BY $orderBy");

        $this->view->renderHtml('main/index.php', [
            'builds' => $builds,
            'sort'   => $sort,
            'title'  => 'PC Configurator — Портал сборок ПК'
        ]);
    }

    public function calculator()
    {
        $result = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cpuPrice = (int)($_POST['cpu'] ?? 0);
            $gpuPrice = (int)($_POST['gpu'] ?? 0);
            $ramPrice = (int)($_POST['ram'] ?? 0);
            $ssdPrice = (int)($_POST['ssd'] ?? 0);
            $needAssembly = isset($_POST['assembly']);

            $totalPrice = $cpuPrice + $gpuPrice + $ramPrice + $ssdPrice + 12000;
            if ($needAssembly) {
                $totalPrice += 3500;
            }

            $psuWatt = ($gpuPrice >= 60000) ? 850 : (($gpuPrice >= 35000) ? 700 : 550);

            $result = [
                'totalPrice' => $totalPrice,
                'psuWatt'    => $psuWatt
            ];
        }

        $this->view->renderHtml('main/calculator.php', [
            'result' => $result,
            'title'  => 'Калькулятор стоимости и мощности ПК'
        ]);
    }
}
