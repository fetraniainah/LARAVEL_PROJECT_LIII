<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckFee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $modele = abonnement::where('user_id',Auth::user()->id)->first();
        $date = Carbon::parse($modele->expired); // Récupère la date existante
        // Calcul de la différence entre la date d'expiration et la date actuelle
        $secondsRemaining = strtotime($date) - time();
        $dayCount = floor($secondsRemaining / 86400);
        if($dayCount < 1){
            return redirect('/payment/mobile');
        }
        return $next($request);
    }
}
