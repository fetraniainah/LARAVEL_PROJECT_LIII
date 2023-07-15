<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\abonnement;
use App\Models\Notification;
use App\Http\Requests\postLogin;
use App\Http\Requests\PostRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login',['message'=>'']);
    }

    public function register(){
        return view('auth.register',['message'=>'']);
    }

    public function logout(){
        Auth::logout();
        return to_route('auth.login');
    }

    //** post authentification */


    public function postLogin(postLogin $request){
       
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashbord');
        }
       return back()->with('massage','Votre login n\'est pas trouver');
    }

    public function postRegister(PostRegister $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            auth()->login($user);
            $date = Carbon::now(); // Récupère la date actuelle
            $date->addDays(15); // Ajoute 15 jours à la date actuelle
            $modele = new abonnement();
            $modele->expired = $date;
            $modele->user_id = Auth::user()->id;
            $modele->save();

            $notification = new Notification();
            $notification->user_id = Auth::user()->id;
            $notification->titre = "Bienvenue !".Auth::user()->name;
            $notification->content = "Bienvenue sur notre plateforme de streaming vidéo ! Nous sommes ravis de vous accueillir parmi nos utilisateurs. Vous pouvez maintenant accéder à des milliers de films, de séries et de documentaires en ligne, où que vous soyez et quand vous le souhaitez. Nous espérons que vous apprécierez la qualité de nos contenus et la fluidité de notre service de streaming. Si vous avez des questions ou des problèmes, n'hésitez pas à contacter notre équipe d'assistance. Nous sommes là pour vous aider à tout moment. Profitez bien de votre expérience de streaming vidéo sur notre plateforme !";
            $notification->save();
        }
        return redirect('/dashbord')->with('success','Félicitations, vous avez une offre de 15 jours gratuits!');
        
    }
}
