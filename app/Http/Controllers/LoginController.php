<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Login\RememberMeExpiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use RememberMeExpiration;

    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->request->add(['activate' => 1]);
        //$credentials = $request->getCredentials();

        //$request->request->add(['activate' => 1]);
        $credentials = $request->only('username', 'password','activate');
        if (!Auth::attempt($credentials)) :
            return redirect()->to('/login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
