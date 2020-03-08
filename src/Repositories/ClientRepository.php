<?php


namespace Soguitech\Stadmin\Repositories;


use Soguitech\Repositories\ResourceRepository;
use Soguitech\Stadmin\Models\Client;

class ClientRepository extends ResourceRepository
{
    /**
     * ClientRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->model = $client;
    }

}