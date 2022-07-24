<?php

namespace App\Console\Commands;

use App\Mail\PostNotification;
use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class NotificationGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for send email notification to subscribers';

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
        $post = Post::findOrFail(2);
        Mail::to('simbolonsihar@gmail.com')->send(new PostNotification($post));

        return 0;
    }
}
