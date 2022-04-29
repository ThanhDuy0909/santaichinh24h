// public function callback_facebook($provider)
    // {
    //     $getInfo = Socialite::driver($provider)->stateless()->facebook();
    //     $user = $this->createUser($getInfo, $provider);
    //     auth()->login($user);
    //     return redirect()->route('infor_user');
    // }

    // public function createUser($getInfo, $provider)
    // {
    //     $user = Account_Model::where('facebook_id', $getInfo->id)->first();
    //     if (!$user) {
    //         $user = Account_Model::create([
    //             'name' => $getInfo->name,
    //             'email' => $getInfo->email,
    //             'facebook_id' => $getInfo->id,
    //             'provider' => $provider,
    //         ]);
    //     }
    //     return $user;
    // }