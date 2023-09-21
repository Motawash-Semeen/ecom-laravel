<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Controllers\AdminController;

=======
>>>>>>> 976207ee6996c4b3bcc035ed40f2744dc9511aa9
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Laravel\Fortify\Fortify;
use Auth;
=======
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
>>>>>>> 976207ee6996c4b3bcc035ed40f2744dc9511aa9

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
     *
     * @return void
     */
    public function register()
    {
       $this->app->when([AdminController::class, AttemptToAuthenticate::class, RedirectIfTwoFactorAuthenticatable::class ])
            ->needs(StatefulGuard::class)
            ->give(function(){
                return Auth::guard('admin');
            });
=======
     */
    public function register(): void
    {
        //
>>>>>>> 976207ee6996c4b3bcc035ed40f2744dc9511aa9
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
     *
     * @return void
     */
    public function boot()
=======
     */
    public function boot(): void
>>>>>>> 976207ee6996c4b3bcc035ed40f2744dc9511aa9
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
<<<<<<< HEAD
            return Limit::perMinute(5)->by($request->email.$request->ip());
=======
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
>>>>>>> 976207ee6996c4b3bcc035ed40f2744dc9511aa9
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
