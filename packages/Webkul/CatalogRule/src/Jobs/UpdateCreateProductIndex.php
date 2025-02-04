<?php
 
namespace Webkul\CatalogRule\Jobs;
 
use Illuminate\Support\Facades\Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\CatalogRule\Helpers\CatalogRuleIndex;
 
class UpdateCreateProductIndex implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    /**
     * Create a new job instance.
     *
     * @param  \Webkul\Product\Contracts\Product  $product
     * @return void
     */
    public function __construct(protected $product)
    {
        $this->product = $product;
    }

    /**
     * Get the cache driver for the unique job lock.
     *
     * @return \Illuminate\Contracts\Cache\Repository
     */
    public function uniqueVia()
    {
        return Cache::driver('redis');
    }
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        app(CatalogRuleIndex::class)->reIndexProduct($this->product);
    }
}