<?php

namespace App\Notifications;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class PostQuoteToTwitter extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private Quote $quote)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    public function toTwitter($notifiable)
    {
        return new TwitterStatusUpdate($this->generateTweet());
    }

    public function generateTweet()
    {
        $word = $this->quote()->words();
        $url = route('quotes.show', $this->quote()->id());
        $author = $this->quote()->person();
        $author = $author->twitter() ? "@{$author->twitter()}" : $author->name();

        return "{$word} by {$author}\n\n{$url}";
    }

    public function quote()
    {
        return $this->quote;
    }

}
