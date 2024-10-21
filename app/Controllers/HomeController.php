<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function upload(): void
    {
        foreach ($_FILES["transactions"]["name"] as $key => $value) {
            $filePath = STORAGE_PATH . '/' . $_FILES['transactions']['name'][$key]; // Формируем путь для каждого файла
            move_uploaded_file(
                $_FILES["transactions"]["tmp_name"][$key], // Временный путь к файлу
                $filePath // Путь для сохранения файла
            );
        }

        
        header('Location: /');
    }

    public function transactions(): View
    {
        return View::make('transactions');
    }
}
