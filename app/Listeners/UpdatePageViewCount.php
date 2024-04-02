<?php

namespace App\Listeners;

use App\Models\PageView;
use App\Events\PageViewed;
use App\Models\PageViewLog;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePageViewCount implements ShouldQueue
{
    /**
     * Handle the event.
     */
    public function handle(PageViewed $event): void
    {
        PageViewLog::create([
            'url' => $event->url,
            'user_id' => $event->id ? $event->id : null,
        ]);

        if ($pageView = PageView::where('url', $event->url)->first()) {
            $pageView->increment('views_count');
            return;
        }

        PageView::create(['url' => $event->url, 'views_count' => 1]);
    }
}
