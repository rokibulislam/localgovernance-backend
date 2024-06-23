<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use App\Models\Event;


class NewEventNotification extends Notification
{
    use Queueable;

    public $event;

    /**
     * Create a new notification instance.
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        Log::info('This is an informational message.');

        return (new MailMessage)
                    ->subject('New Event Created')
                    ->line('A new event has been created:')
                    ->line($this->event->name)
                    ->line('Event Description: ' . $this->event->description)
                    ->line('Event Start Date: ' . $this->event->start_date)
                    ->line('Event End Date: ' . $this->event->end_date)
                    ->line('Event Location: ' . $this->event->location)
                    ->action('View Event', url('/events/' . $this->event->id))
                    ->line('Thank you for subscribing!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }



}
