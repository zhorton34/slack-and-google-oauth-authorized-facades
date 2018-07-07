<?php namespace App\Services\Google;

class Search extends GoogleAction
{

    protected $resources = ['folder', 'document', 'spreadsheet', 'script'];


    /**
     * @param $resource
     *   any method that matches a value in the resources array will search the user
     *   google drive for all files of that resource type
     * @param $options
     * @return \Illuminate\Support\Collection|string
     */
    public function __call($resource, $options)
    {
        $resource = $this->checkForResource($resource);

        if(!$resource) return 'Can not search for resource that does not exist';

        return $this->find($resource);

    }

    protected function find($resource)
    {
        $filter = ["q" => "trashed = false AND mimeType='application/vnd.google-apps.{$resource}'"];

        return collect($this->drive->files->listFiles($filter));
    }

    public function all()
    {
        return collect($this->drive->files->listFiles());
    }


    protected function checkForResource($resource)
    {
        $resource = rtrim($resource, 's');

        if(in_array($resource, $this->resources)) return $resource;

        return false;

    }
}
