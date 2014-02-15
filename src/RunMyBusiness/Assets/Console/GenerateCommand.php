<?php namespace RunMyBusiness\Assets\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Filesystem\FileNotFoundException;
use Symfony\Component\Console\Input\InputOption;
use RunMyBusiness\Assets\Simpleassets as SimpleAssets;

/**
 * Generates a new asset cache hash
 */
class GenerateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'simpleassets:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a new asset hash';


    /**
     * Create a new key generator command.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->line('Generating new asset hash. Environment: <comment>'.$this->laravel->make('env').'</comment>');

        list($path, $contents) = $this->getConfigFile();

        if (!$path) {
            return;
        }

        $hash_input = $this->option('hash') ?: null;

        $hash = $this->generateHash($hash);

        $contents = $this->replaceHash($hash, $contents);

        $this->files->put($path, $contents);

        $this->laravel['config']['simpleassets::hash'] = $hash;

        $msg = "New hash {$hash} generated.";
        $this->info($msg);
    }

    /**
     * Get the key file and contents.
     *
     * @return array
     */
    protected function getConfigFile()
    {
        $env = $this->option('env') ? $this->option('env').'/' : '';
        try {
            $path = $this->laravel['path']."/config/{$env}simpleassets.php";
            $contents = $this->files->get($path);
            return array($path, $contents);
        } catch (FileNotFoundException $e) {
            $this->error("simpleassets config file not found.");
            $this->info("Did you publish the cache config?");
            $this->info("Try running php artisan config:publish runmybusiness/simpleassets ");
            throw new \Exception("simpleassets config file not found.");
        }
    }

    /**
     * Generate a random key for the application.
     *
     * @return string
     */
    protected function generateHash()
    {
        return SimpleAssets::generateHash();
    }

    protected function replaceHash($hash, $content)
    {
        $current = $this->laravel['config']['simpleassets::hash'];
        $content = preg_replace(
            "/([\'\"]hash[\'\"].+?[\'\"])(".preg_quote($current, '/').")([\'\"].*)/",
            "'hash' => '" . $hash . "',",
            $content,
            1,
            $count
        );
        if ($count != 1) {
            throw new \Exception("Could not find current hash key in config file.");
        }
        return $content;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
           array('hash', null, InputOption::VALUE_OPTIONAL, 'String to base hash off of, useful for deploying to multiple machines instead of generating multiple hashes.'),
        );
    }
}
