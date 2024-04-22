<?php

namespace App\Console\Commands;

use App\Models\Quote;
use App\Notifications\PostQuoteToTwitter as PostQuoteToTwitterNotification;
use Illuminate\Console\Command;
use Illuminate\Notifications\AnonymousNotifiable;

class PostQuoteToTwitter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quo:post-quote-to-twitter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posts the latest unshared quote to Twitter';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(AnonymousNotifiable $notifiable)
    {
        // return Command::SUCCESS;
        if ($quote = Quote::nextForSharing()) {
            $notifiable->notify(new PostQuoteToTwitterNotification($quote));

            $quote->markAsPosted();
        }
    }
}
