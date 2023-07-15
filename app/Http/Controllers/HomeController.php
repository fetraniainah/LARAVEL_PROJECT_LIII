<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Video;
use App\Models\Payment;
use App\Models\abonnement;
use App\Models\Favories;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){
        return view('dashbord.home');
    }

    public function getPageSearch(){
        return view('search.result');
    }

    public function postSearch(Request $request){
        $result = Video::where('titre','like','%'.$request->search.'%')->paginate(30);
        return view('search.result',['result'=>$result]);
    }

    public function mobile(){
        return view('order.mobile');
    }

    public function card(){
        return view('order.card');
    }

    public function start(){
       $videos =  Video::all();
       $users = User::all();
       $userCount = User::where('isAdmin',false)->count();
       $videoCount = Video::count();
       $budjet = Payment::sum('montant');
        return view('option',['videos'=>$videos,'users'=>$users,'userCount'=>$userCount,'videoCount'=>$videoCount,'budjet'=>$budjet]);
    }

    public function setLang($lang){
        App::setLocale($lang);
        Session::put('lang',$lang);
        return back();
    }

    public function postFees(Request $request){
        if(!is_numeric($request->count)){
            return back()->with('fail','Votre numéro est invalide');
        }
       $res =  Payment::create([
        'user_id'=>Auth::user()->id,
        'method'=>$request->method,
        'count'=>$request->count,
        'montant'=>$request->montant
        ]);

        if($res){

            $modele = abonnement::where('user_id',Auth::user()->id)->first();
            $date = Carbon::parse($modele->expired); // Récupère la date existante
            $date->addDays(30); // Ajoute 30 jours à la date existante
            $modele->expired = $date;
            $modele->save();

            $notification = new Notification();
            $notification->user_id = Auth::user()->id;
            $notification->titre = "Bonjour ! ".Auth::user()->name;
            $notification->content = " Félicitations ! Votre paiement a été effectué avec succès et vous avez ajouté 30 jours d\'accès supplémentaires ";
            $notification->save();

            return redirect('/dashbord')->with('success', 'Félicitations ! Votre paiement a été effectué avec succès et vous avez ajouté 30 jours d\'accès supplémentaires');
        }else{
            return back()->with('fail','Il y a un problème lors de l\'envoi de la requête');
        }
    }


    public function notification(){
        $notification = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
        return view('dashbord.notification',['notification'=>$notification]);
    }

    public function getFavoris(){
        $favoris = Favories::where('user_id',Auth::user()->id)->get();
        
        return view('dashbord.favoris',['favoris'=>$favoris]);
    }
}
