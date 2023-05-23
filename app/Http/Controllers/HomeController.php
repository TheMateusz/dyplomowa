<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search()
    {
        $user = Auth::user();
        $userInterests = $user->interests->pluck('id')->toArray();
        $userMinAge = $user->details->min_age;
        $userMaxAge = $user->details->max_age;
        $userCity = $user->details->city;
        $userCountry = $user->details->country;

        // Pobierz ID wszystkich dopasowanych użytkowników
        $matchedUserIds = $user->friends->pluck('id')->toArray();

        $similarUsers = User::where('users.id', '!=', $user->id)
            ->whereNotIn('users.id', $matchedUserIds) // Wyklucz już dopasowanych użytkowników
            ->whereHas('details', function ($query) use ($userMinAge, $userMaxAge, $userCity, $userCountry) {
                $currentYear = date('Y');
                $minBirthYear = $currentYear - $userMaxAge;
                $maxBirthYear = $currentYear - $userMinAge;
                $query->whereBetween(DB::raw("year"), [$minBirthYear, $maxBirthYear]);
            })
            ->withCount(['interests' => function ($query) use ($userInterests) {
                $query->whereIn('interests.id', $userInterests);
            }])
            ->get();

        $similarUsers->transform(function ($similarUser) use ($userInterests, $userCity, $userCountry) {
            $matchingInterestsCount = $similarUser->interests_count;
            $totalInterestsCount = count($userInterests) + 2;

            if ($similarUser->details->city === $userCity) {
                $matchingInterestsCount += 1;
            }

            if ($similarUser->details->country === $userCountry) {
                $matchingInterestsCount += 1;
            }

            $similarUser->matchingPercentage = ($matchingInterestsCount / $totalInterestsCount) * 100;

            return $similarUser;
        });

        $similarUsers = $similarUsers->sortByDesc('matchingPercentage');

        $mostMatchingUser = $similarUsers->first();

        if ($mostMatchingUser) {
            $user->friends()->attach($mostMatchingUser->id);
            $mostMatchingUser->friends()->attach($user->id);
        }

        return view('search', [
            'user' => $user,
            'similarUsers' => $similarUsers,
            'mostMatchingUser' => $mostMatchingUser,
        ]);
    }

    public function addFriend(User $friend)
    {
        $user = Auth::user();

        if ($user->friends()->where('friend_id', $friend->id)->exists()) {
            return redirect()->back()->with('error', 'Już jesteś znajomym tego użytkownika.');
        }

        // Dodaj znajomość do tabeli friends
        $user->friends()->attach($friend->id);

        return redirect()->back()->with('success', 'Dodano użytkownika jako znajomego.');
    }
}
