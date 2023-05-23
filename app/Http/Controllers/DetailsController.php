<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $detail = new Detail();

        $detailsData = [
            'year' => $request->input('year'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'min_age' => $request->input('min-age'),
            'max_age' => $request->input('max-age'),
        ];

        $detail->updateOrCreate(['user_id' => Auth::id()], $detailsData);
        return redirect()->route('user.index');
    }
}
