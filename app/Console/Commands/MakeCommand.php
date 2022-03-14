<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

abstract class MakeCommand extends Command
{
    public function handle(): void
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $content = $this->getStubContents(
            $this->getStubPath(),
            $this->getStubVariables()
        );

        if (!$this->files->exists($path)) {
            $this->files->put($path, $content);
            $this->info("Arquivo: {$path} criado");
        } else {
            $this->info("Arquivo: {$path} já existe");
        }
    }

    abstract public function getSourceFilePath();

    abstract public function getStubPath();

    abstract public function getStubVariables(): array;

    public function getStubContents(String $stub, array $stubVariables=[]): String
    {
        $contents = file_get_contents($stub);

        foreach($stubVariables as $search => $replace) {
            $contents = str_replace(
                '$'.$search.'$',
                $replace,
                $contents
            );
        }

        return $contents;
    }

    public function makeDirectory(String $path): String
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
