<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected function authenticated()
    {
        $user = User::where('id', Auth::id())->first();


        if ($user->city != '' && $user->city != null) {
            switch ($user->city) {
                case 'Москва':
                    $city = 'Москва';
                    $city_name = 'Москве';
                    break;
                case 'Санкт-Петербург':
                    $city = 'Санкт-Петербург';
                    $city_name = 'Санкт-Петербурге';
                    break;
                case 'Новосибирск':
                    $city = 'Новосибирск';
                    $city_name = 'Новосибирске';
                    break;
                case 'Екатеринбург':
                    $city = 'Екатеринбург';
                    $city_name = 'Екатеринбурге';
                    break;
                case 'Казань':
                    $city = 'Казань';
                    $city_name = 'Казани';
                    break;
                case 'Нижний Новгород':
                    $city = 'Нижний Новгород';
                    $city_name = 'Нижнем Новгороде';
                    break;
                case 'Челябинск':
                    $city = 'Челябинск';
                    $city_name = 'Челябинске';
                    break;
                case 'Самара':
                    $city = 'Самара';
                    $city_name = 'Самаре';
                    break;
                case 'Омск':
                    $city = 'Омск';
                    $city_name = 'Омске';
                    break;
                case 'Ростов-на-Дону':
                    $city = 'Ростов-на-Дону';
                    $city_name = 'Ростове-на-Дону';
                    break;
                case 'Уфа':
                    $city = 'Уфа';
                    $city_name = 'Уфе';
                    break;
                case 'Красноярск':
                    $city = 'Красноярск';
                    $city_name = 'Красноярске';
                    break;
                case 'Воронеж':
                    $city = 'Воронеж';
                    $city_name = 'Воронеже';
                    break;
                case 'Пермь':
                    $city = 'Пермь';
                    $city_name = 'Перми';
                    break;
                case 'Волгоград':
                    $city = 'Волгоград';
                    $city_name = 'Волгограде';
                    break;
            }
        }
        elseif (session()->get('city')) {
            $city = session()->get('city');
            $city_name = session()->get('city_name');
        } else {
            $city = "Москва";
            $city_name = "Москве";
        }

        session()->put('city', $city);
        session()->put('city_name', $city_name);


        if ($user->status == 'organizator') {
            return redirect('/artists');
        }
        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        if (session()->get('city')) {
            $city = session()->get('city');
            $city_name = session()->get('city_name');
        } else {
            $city = "Москва";
            $city_name = "Москве";
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        session()->put('city', $city);
        session()->put('city_name', $city_name);

        return redirect()->route('index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
