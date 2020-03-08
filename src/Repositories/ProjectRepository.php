<?php


namespace Soguitech\Stadmin\Repositories;


use Soguitech\Repositories\ResourceRepository;

class ProjectRepository extends ResourceRepository
{
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->model = $projectRepository;
    }

}