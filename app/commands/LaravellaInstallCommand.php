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

// Publish the Assets
        $this->call('asset:publish');
//        $this->call('config:publish');
        
// Setup Migrations and Assets
        $this->call('cms:install');
        $this->call('skins:install');
        $this->call('uploader:install');
        $this->call('cart:install');
        
        $this->call('crud:install');

        $this->call('cms:update');
        $this->call('skins:update');
        $this->call('uploader:update');
        $this->call('cart:update');
        
// update cms fields' meta data e.g. custom display types etc.
        $this->call('db:seed', array('--class' => 'PostCrudSeeder'));
        
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