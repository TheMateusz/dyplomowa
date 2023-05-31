<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $details = $user->details;

        return view('details', [
            'details' => $details,
        ]);
    }
    public function update(Request $request)
    {
        $detail = Detail::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'year' => $request->input('year'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'min_age' => $request->input('min-age'),
                'max_age' => $request->input('max-age'),
                'gender' => $request->input('gender'),
            ]
        );

        if ($request->hasFile('avatar')) {
            $oldImagePath = $detail->avatar;

            if ($oldImagePath && Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }

            $imagePath = $request->file('avatar')->store('avatars');
            $detail->avatar = $imagePath;
            $detail->save();
        }


        return redirect()->route('user.index');
    }
}
