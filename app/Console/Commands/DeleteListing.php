<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Carbon;
class DeleteListing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:listing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Listing After Expire Date';

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
        
        $mytime = Carbon\Carbon::now();
        // echo $mytime->toDateTimeString();
        // die();
       $posts = Post::where('expire_date', '<' , $mytime )->get();
       foreach($posts as $post){
        //  $post->delete();
        Post::udpate('status', '1')->where('id',$post->id);
        
       }
       $this->info('Successfully Deleted Expire Listing');
    }
}
