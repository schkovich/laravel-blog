<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 22/06/15
 * Time: 03:56
 */

namespace LaravelBlog\Console\Commands;


use Faker\Provider\zh_TW\DateTime;
use Illuminate\Console\Command;

class Publish extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled blog.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = new \DateTime();
        Blog::where('published_on', '=', $today->format('Y-m-d'))->get()->update(['published' => true]);
    }

}
