<?php

namespace App\Interfaces;

interface RepositoryMail
{
    public function send(array $data);

    public function totalMail(array $data);
}
