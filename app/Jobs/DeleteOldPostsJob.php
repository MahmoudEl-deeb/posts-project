<?php

namespace App\Jobs;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DeleteOldPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
       
    }

    
    public function handle(): void
    {
       
        $twoYearsAgo = Carbon::now()->subYears(2);
        
        $deletedCount = Post::where('created_at', '<', $twoYearsAgo)->delete();
        
        
        Log::info("PruneOldPostsJob: Deleted {$deletedCount} posts older than 2 years.");
    }
}