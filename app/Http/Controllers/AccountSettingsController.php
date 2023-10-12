<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AccountSettingsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view("pages.account-settings.account-settings", compact("user"));
    }

    public function edit()
    {
        $user = Auth::user();
        return view("pages.account-settings.edit-account", compact("user"));
    }

    public function update(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate(
            [
                "name" => "required|string|max:255",
                "email" => "required|email|unique:users,email," . $userId,
                "description" => "nullable|string",
                "phone_number" => "nullable|string|max:255",
                "barangay" => "nullable|string|max:255",
                "password" => "nullable|string|min:8|confirmed",
            ],
            [
                "password.confirmed" => "The password confirmation does not match.",
            ]
        );

        $user = User::find($userId);
        $originalUserData = $user->toArray();

        $user->name = $validatedData["name"];
        $user->email = $validatedData["email"];
        $user->description = $validatedData["description"];
        $user->phone_number = $validatedData["phone_number"];
        $user->barangay = $validatedData["barangay"];

        if (!empty($validatedData["password"])) {
            $user->password = bcrypt($validatedData["password"]);
        }

        $user->save();

        $updatedUserData = $user->toArray();
        $changes = array_diff_assoc($updatedUserData, $originalUserData);

        if (count($changes) > 0) {
            return redirect()
                ->route("account-settings")
                ->with("success", "Account updated successfully");
        } else {
            return redirect()
                ->route("account-settings")
                ->with("info", "No changes were made");
        }
    }

    public function logs()
    {
        return view("pages.account-settings.account-logs");
    }
}
