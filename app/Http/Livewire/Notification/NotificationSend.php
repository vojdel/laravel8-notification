<?php

namespace App\Http\Livewire\Notification;

use App\Models\User;
use App\Notifications\NotificationTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use App\Http\Controller\MailController;

class NotificationSend extends Component
{

    public $title;
    public $subject;
    public $message;
    public $users;
    public $user;

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::user()->id)->get();
    }

    public function send()
    {
        $sendEmail = User::find($this->user);
        //$sendEmail = auth()->user();
        //dd($sendEmail);
        //dd($this->user);
        AppMailController
        Notification::send($sendEmail, new NotificationTest([
            "title" => $this->title,
            "asunto" => $this->subject,
            "url" => "/dashboard",
            "name" => $sendEmail->name,
            "email" => $sendEmail->email
        ]));
        return redirect('/email');
    }

    public function render()
    {
        return view('livewire.notification.notification-send');
    }
}
