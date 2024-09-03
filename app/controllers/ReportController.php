<?php

class ReportController extends Controller {

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => 1, // Em uma aplicação real, pegue o ID do usuário autenticado
                'description' => $_POST['description'],
                'location' => $_POST['location'],
                'image' => $_FILES['image']['name']
            ];

            $report = $this->model('Report');
            if ($report->create($data)) {
                move_uploaded_file($_FILES['image']['tmp_name'], '../public/images/' . $_FILES['image']['name']);
                header('Location: /report/status');
            }
        } else {
            $this->view('report/create');
        }
    }

    public function status() {
        $report = $this->model('Report');
        $reports = $report->getAll();
        $this->view('report/status', ['reports' => $reports]);
    }

    public function view($id) {
        $report = $this->model('Report');
        $data = $report->getById($id);
        $this->view('report/view', $data);
    }
}
