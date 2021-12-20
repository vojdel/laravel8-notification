<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;
use function GuzzleHttp\json_decode;

class NotificationIndex extends Component
{

    public $messages;

    public function mount(){
        $this->messages = auth()->user()->notifications;
        //dd($this->messages);
        //foreach($this->messages as $key => $message){
            //$this->messages[$key]->data = json_decode($message->data);
        //}
        //dd($this->messages);
    }

    public function markRead($key)
    {
        $this->messages[$key]->markAsRead();
        //dd($message);
    }

    public function render()
    {
        return view('livewire.notification.notification-index');
    }
}
