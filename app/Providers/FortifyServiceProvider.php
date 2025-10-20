<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Vista de login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // 👇 Aquí forzamos la redirección después del login
        Fortify::authenticateUsing(function (Request $request) {
            // Laravel ya hace la validación de credenciales,
            // aquí solo devolvemos el usuario
            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user && \Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        // 👇 Sobrescribimos la redirección post-login
        app()->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            function () {
                return new class implements \Laravel\Fortify\Contracts\LoginResponse {
                    public function toResponse($request)
                    {
                        $role = $request->user()->role ?? null;

                        if ($role === 'admin') {
                            return redirect()->intended('/admin');
                        }

                        if ($role === 'docente') {
                            return redirect()->intended('/docente');
                        }

                        return redirect()->intended('/home');
                    }
                };
            }
        );
    }
}
