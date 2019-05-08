<?php

namespace Jvdw\Analytics\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

use Jvdw\Analytics\Models\AnalyticsEvent;

class AddAnalyticsEvent extends Command
{
    use DetectsApplicationNamespace;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app-analytics:add {event}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an analytics event with the given name to your database.';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->line("Adding {$this->argument('event')} event...");
        $event = new AnalyticsEvent;
        $event->name = $this->argument('event');
        $event->save();
        $this->comment("<fg=green>Successfully added {$this->argument('event')} event!</>");
    }
}