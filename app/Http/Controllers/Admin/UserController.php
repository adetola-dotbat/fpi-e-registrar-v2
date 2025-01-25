<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function index()
    {
        $data = [
            'pageTitle' => 'User Management',
            'users' => $this->userService->getManagementUser(),
        ];
        return view('pages.users.index', $data);
    }


    public function store(StoreRequest $request)
    {
        try {
            $this->userService->store($request->validated());
            return redirect()->route('admin.user.index')->with('success', 'User created and roles assigned successfully.');
        } catch (\Exception $ex) {
            return redirect()->back()->with("error", "Not successful," . $ex->getMessage());
        }
    }
}
