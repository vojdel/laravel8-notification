<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Interfaces\RepositoryMail;
use App\Notifications\NotificationTest;
use Illuminate\Support\Facades\Notification as NotificationSend;

class MailController implements RepositoryMail
{

    protected $model;

    public function __contructor(Notification $notification)
    {
        $this->model = $notification;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  array  $sendEmail
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function send($sendEmail, $data)
    {
        NotificationSend::send($sendEmail, new NotificationTest([
            "title" => $data->title,
            "asunto" => $data->subject,
            "url" => "/dashboard",
            "name" => $sendEmail->name,
            "email" => $sendEmail->email
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function totalMail($total)
    {
        return count($this->model->all());
    }
}
