<?php

namespace Laravella\Laravella;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LaravellaInstallCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravella:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the shopping cart.';

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
     * @return void
     */
    public function fire()
    {
// Link all !
        $this->call('dump-autoload');

// Clear all past migrations
//        $this->call('migrate:reset');

// Setup Migrations and Assets
        $this->call('cms:install');
        $this->call('crud:install');

// Publish the Assets
        $this->call('asset:publish');

//install user app        
        $this->call('migrate', array('--package' => 'laravella/laravella'));
        $this->call('db:seed', array('--class' => 'LaravellaDatabaseSeeder'));

// Run again to calculate metadata for all new tables
        $this->call('crud:install');
        $this->call('uploader:install');

//update cms fields' meta data e.g. custom display types etc.
        $this->call('db:seed',array('--class'=>'Laravella\\CMS\\CrudSeeder'));
        
        $this->info('Laravella installation complete.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
                //array('example', InputArgument::REQUIRED, 'An example argument.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
                //array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
        );
    }

}