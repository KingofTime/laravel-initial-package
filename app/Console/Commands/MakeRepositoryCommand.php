<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um repository';

    public function __construct(
        protected Filesystem $files
    )
    {
        parent::__construct();
    }

    public function createModelName($name)
    {
        return str_replace('Repository', '', $name);
    }

    public function createVarModelName($name)
    {
        return "$".lcfirst(str_replace('Repository', '', $name));
    }

    public function getSourceFilePath()
    {
        return base_path('App\\Repositories'). '\\'.
            $this->argument('name'). '.php';
    }

    public function getStubPath()
    {
        return __DIR__.'/../../../stubs/repository.stub';
    }

    public function getStubVariables(): array
    {
        $name = $this->argument('name');
        return [
            'REPOSITORY_NAME' => $name,
            'MODEL_NAME' => $this->createModelName($name),
            'VAR_MODEL_NAME' => $this->createVarModelName($name)
        ];
    }

}
