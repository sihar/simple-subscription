<?php

namespace App\Console\Commands;

use App\Mail\PostNotification;
use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class NotificationGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for send email notification to subscribers by specific website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = $this->argument('url');
        
        // send email without queue
        // $post = Post::first();
        // $subscribers = Subscriber::where('website', $url)->get();
        // foreach ($subscribers as $subscriber) {
        //     Mail::to($subscriber->email)->send(new PostNotification($post));
        // }

        dispatch(new \App\Jobs\SendNotificationJob($url));

        return 0;
    }
}
