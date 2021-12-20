<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationTest extends Notification
{
    use Queueable;

    private $notificacion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificacion)
    {
         $this->notificacion = $notificacion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->notificacion['title'])
            //->to($this->notificacion['email'])
            //->greeting("hola {$this->notifiable->full_name}")
            ->greeting($this->notificacion['asunto'])
            //->from(auth()->user()->email, auth()->user()->name)
            ->from('admin@admin.com')
            ->line($this->notificacion['message'])
            ->action('Notification Action', url($this->notificacion['url']));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "title" => $this->notificacion[ 'title' ],
            "asunto" => $this->notificacion[ 'asunto' ],
            "url" => $this->notificacion[ 'url' ],
            "email" => $notifiable->email,
            "name" => $this->notificacion['name'],
            "message" => $this->notificacion['message']
        ];
    }
}
