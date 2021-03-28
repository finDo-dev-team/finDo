<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\Models\User;

class SocialiteController extends Controller
{
     // Le tableaux des providers autorisés
     protected $providers = [ "google"];

     # La vue pour les liens vers les providers
     public function loginRegister () {
         return Inertia::render("socialite.login-register");
     }
 
     # redirection vers le provider
     public function redirect (Request $request) {
 
         $provider = $request->provider;
 
         // On vérifie si le provider est autorisé
         if (in_array($provider, $this->providers)) {
             return Socialite::driver($provider)
             ->scopes(['openid','profile','email','https://www.googleapis.com/auth/calendar'])
             ->redirect(); // On redirige vers le provider
         }
         abort(404); // Si le provider n'est pas autorisé
     }
 
     // Callback du provider
     public function callback (Request $request) {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {

        	// Les informations provenant du provider
            $data = Socialite::driver($request->provider)->user();

            # Social login - register

            $email = $data->getEmail(); // L'adresse email
            $name = $data->getName(); // le nom
            

            # 1. On récupère l'utilisateur à partir de l'adresse email
            $user = User::where("email", $email)->first();

            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->name = $name;
                $user->save();

            # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {
                
                // Enregistrement de l'utilisateur
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("emilie") // On attribue un mot de passe
                ]);
            }
            

            # 4. On connecte l'utilisateur
            $token = $data->token;
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /dashboard
            if (auth()->check()) return redirect('/dashboard');

         }
         abort(404);

        }
}

