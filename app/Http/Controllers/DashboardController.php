<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::with('referredUsers')->find($id);

        if (!$user) {
            // Handle case where the user with the given ID does not exist
            abort(404);
        }

        $usersTree = $this->buildTree($user);
        return view('userTree', compact('usersTree'));
    }

    public static function buildTree(User $user)
{
    $tree = [
        "id" => $user->id,
        "name" => $user->name,
        "email" => $user->email,
        "email_verified_at" => $user->email_verified_at,
        "referrer_id" => $user->referrer_id,
        "referral_code" => $user->referral_code,
        "referral_level" => 0, // Assuming you want to start with 0, you can adjust this as needed
        "created_at" => $user->created_at,
        "updated_at" => $user->updated_at,
        "referred_users" => [],
    ];

    // Recursively build the tree for each referred user
    if ($user->referredUsers) {
        foreach ($user->referredUsers as $referredUser) {
            $childTree = self::buildTree($referredUser);
            $tree["referred_users"][] = $childTree;
        }
    }

    return json_decode(json_encode($tree));
}


    /**
     * Get a tree structure of users and their referrals.
     *
     * @return array
     */

}
