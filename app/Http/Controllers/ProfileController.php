<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Jobs\DeleteUser;
use App\Jobs\UpdateProfile;
use App\Policies\UserPolicy;
use Illuminate\Auth\Middleware\Authenticate;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    public function edit()
    {
        $this->data['title'] = 'Setting Profile';
        return $this->loadTheme('settings.index', $this->data);
    }

    public function update(UpdateProfileRequest $request)
    {
        $this->dispatchSync(UpdateProfile::fromRequest($request->user(), $request));

        $this->success('settings.updated');

        return redirect()->route('settings.profile');
    }

    public function destroy(Request $request)
    {
        $this->authorize(UserPolicy::DELETE, $user = $request->user());

        $this->dispatchSync(new DeleteUser($user));

        $this->success('settings.deleted');

        return redirect()->route('home');
    }
}
