<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleApproved extends Notification
{
    use Queueable;
    private User $user;
    private string $category;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
//        dd($info);
        $this->user = $info['user'];
        $this->category = $info['category'];
        $this->id = $info['id'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/article/'.$this->id);

        return (new MailMessage)
            ->subject('New Article Published!')
            ->greeting('Hello, '.$this->user->name.'!')
            ->line('A new article has been published under '.$this->category.' category')
            ->line('You can view the article by following the link below')
            ->action('View Article', $url)
            ->line('Thank you for using World Wide News!');
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
            //
        ];
    }
}
