<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserFavoritesController extends Controller
{
    //  public function store($id)
    public function store(Request $req, $id)
    {
        
        \Auth::user()->favorite($id);
        
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
    
    public function favorittings($id)
    {
        $user = User::find($id);
        $favorittings = $user->favorittings()->paginate(10);
        $data = [
            'user' => $user,
            'fav' => $favorittings,
        ];

        $data += $this->counts($user);

        return view('favorite.favorite', $data);
    }
}
