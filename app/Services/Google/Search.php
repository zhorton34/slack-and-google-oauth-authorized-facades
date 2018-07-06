<?php namespace App\Services\Google;

class Search extends GoogleAction
{

    protected $filters = ['folder', 'document', 'spreadsheet', 'script'];


    protected function find($resource)
    {
        $filter = ["q" => "trashed = false AND mimeType='application/vnd.google-apps.{$resource}'"];

        return collect($this->drive->files->listFiles($filter));
    }

    public function all()
    {
        return collect($this->drive->files->listFiles());
    }


    public function __call($resource, $options)
    {
        $resource = $this->checkForResource($resource);

        if(!$resource) return 'Can not search for resource that does not exist';

        return $this->find($resource);

    }

    protected function checkForResource($resource)
    {
        $resource = rtrim($resource, 's');

        if(in_array($resource, $this->filters)) return $resource;

        return false;

    }
}
