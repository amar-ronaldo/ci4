<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ClearTemp extends BaseCommand
{
    protected $group       = 'Development';
    protected $name        = 'dev:clear';
    protected $description = 'Clear dev file.';

    public function run(array $params)
    {
        // CLI::($params);
        try {

            if (in_array(['-c', 'cache'], $params)) {
                CLI::write('PHP Version: ' . CLI::color(phpversion(), 'yellow'));
                CLI::write('CI Version: ' . CLI::color(\CodeIgniter\CodeIgniter::CI_VERSION, 'yellow'));
                CLI::write('APPPATH: ' . CLI::color(APPPATH, 'yellow'));
                CLI::write('SYSTEMPATH: ' . CLI::color(SYSTEMPATH, 'yellow'));
                CLI::write('ROOTPATH: ' . CLI::color(ROOTPATH, 'yellow'));
                CLI::write('Included files: ' . CLI::color(count(get_included_files()), 'yellow'));
            }
            
        } catch (\Exception $e) {
            $this->showError($e);
        }
    }
}
