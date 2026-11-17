<?php

class BuildsController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
        $this->db = new Db();
    }

    public function show(int $id)
    {
        $this->db->execute('UPDATE builds SET views = views + 1 WHERE id = :id', [':id' => $id]);

        $res = $this->db->query('SELECT * FROM builds WHERE id = :id', [':id' => $id]);
        if (empty($res)) {
            http_response_code(404);
            echo 'Сборка не найдена';
            return;
        }
        $build = $res[0];

        $authorRes = $this->db->query('SELECT * FROM users WHERE id = :id', [':id' => $build['author_id']]);
        $author = $authorRes[0] ?? ['nickname' => 'Гость', 'role' => 'Пользователь'];

        $this->view->renderHtml('builds/show.php', [
            'build'  => $build,
            'author' => $author,
            'title'  => $build['title']
        ]);
    }

    public function add()
    {
        $users = $this->db->query('SELECT * FROM users');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->execute(
                'INSERT INTO builds (author_id, title, category, cpu, gpu, ram, storage, price, description) 
                 VALUES (:author_id, :title, :category, :cpu, :gpu, :ram, :storage, :price, :description)',
                [
                    ':author_id'   => (int)$_POST['author_id'],
                    ':title'       => trim($_POST['title']),
                    ':category'    => trim($_POST['category']),
                    ':cpu'         => trim($_POST['cpu']),
                    ':gpu'         => trim($_POST['gpu']),
                    ':ram'         => trim($_POST['ram']),
                    ':storage'     => trim($_POST['storage']),
                    ':price'       => (int)$_POST['price'],
                    ':description' => trim($_POST['description']),
                ]
            );
            header('Location: /');
            exit;
        }

        $this->view->renderHtml('builds/add.php', [
            'users' => $users,
            'title' => 'Добавить новую сборку ПК'
        ]);
    }

    public function edit(int $id)
    {
        $res = $this->db->query('SELECT * FROM builds WHERE id = :id', [':id' => $id]);
        if (empty($res)) {
            http_response_code(404);
            echo 'Сборка не найдена';
            return;
        }
        $build = $res[0];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->execute(
                'UPDATE builds SET title = :title, category = :category, cpu = :cpu, gpu = :gpu, 
                 ram = :ram, storage = :storage, price = :price, description = :description WHERE id = :id',
                [
                    ':title'       => trim($_POST['title']),
                    ':category'    => trim($_POST['category']),
                    ':cpu'         => trim($_POST['cpu']),
                    ':gpu'         => trim($_POST['gpu']),
                    ':ram'         => trim($_POST['ram']),
                    ':storage'     => trim($_POST['storage']),
                    ':price'       => (int)$_POST['price'],
                    ':description' => trim($_POST['description']),
                    ':id'          => $id
                ]
            );
            header('Location: /builds/' . $id);
            exit;
        }

        $this->view->renderHtml('builds/edit.php', [
            'build' => $build,
            'title' => 'Редактирование сборки'
        ]);
    }

    public function delete(int $id)
    {
        $this->db->execute('DELETE FROM builds WHERE id = :id', [':id' => $id]);
        header('Location: /');
        exit;
    }
}
