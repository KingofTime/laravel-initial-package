<?php

namespace App\Console\Commands;


use Illuminate\Filesystem\Filesystem;

class MakeServiceCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um service';

    public function __construct(
        protected Filesystem $files
    )
    {
        parent::__construct();
    }


    public function createRepositoryName($name)
    {
        return str_replace('Service', 'Repository', $name);
    }

    public function createVarRepositoryName($name)
    {
        return "$".lcfirst(str_replace('Service', 'Repository', $name));
    }

    public function getSourceFilePath()
    {
        return base_path('app/Services'). '/'.
            $this->argument('name'). '.php';
    }

    public function getStubPath()
    {
        return __DIR__.'/../../../stubs/service.stub';
    }

    public function getStubVariables(): array
    {
        $name = $this->argument('name');
        return [
            'SERVICE_NAME' => $name,
            'REPOSITORY_NAME' => $this->createRepositoryName($name),
            'VAR_REPOSITORY_NAME' => $this->createVarRepositoryName($name)
        ];
    }

}
