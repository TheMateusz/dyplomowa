<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();

        $interests = Interest::all();

        $selectedInterests = $user->interests;

        return view('interests', [
            'interests' => $interests,
            'selectedInterests' => $selectedInterests,
        ]);
    }

    public function update(Request $request)
    {
        $selectedInterests = $request->input('hobby', []);
        $user = Auth::user();

        $user->interests()->sync($selectedInterests);

        return redirect()->route('user.index');
    }
}
