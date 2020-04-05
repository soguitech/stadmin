<?php


namespace Soguitech\Stadmin\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Soguitech\Stadmin\Facades\Admin;
use Soguitech\Stadmin\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('stadmin.auth');
        $this->userRepository = $userRepository;
    }

    /**
     * @return Factory|View
     */
    public function dashboard ()
    {
        return view('stadmin::home');
    }

    public function index ()
    {
        return view('stadmin::users.index', [
            'users' => $this->userRepository->getAll()
        ]);

    }
}