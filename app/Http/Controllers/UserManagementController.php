<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserManagementController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;
        $query = $request->input('query');

        $usersQuery = User::orderBy("role", "asc");

        if (!empty($query)) {
            $usersQuery->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                            ->orWhere('barangay', 'like', "%$query%");
            });
        }

        $users = $usersQuery->paginate($perPage);

        return view("pages.user-management.user-management", [
            "users" => $users,
            "query" => $query, // Pass the query parameter to the view
        ]);
    }



    public function create()
    {
        return view("pages.user-management.create-user");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8",
            "role" => "required|in:0,1",
            "description" => "nullable|string",
            "phone_number" => "nullable|string|max:255",
            "barangay" => "nullable|string|max:255",
        ]);

        $user = new User();
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = bcrypt($data["password"]);
        $user->role = $data["role"];
        $user->description = $data["description"];
        $user->phone_number = $data["phone_number"];
        $user->barangay = $data["barangay"];
        $user->save();

        return redirect()
            ->route("user-management")
            ->with("success", "User created successfully");
    }

    public function update(Request $request, $id)
    {
        
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route("user-management")
                ->with("error", "User not found");
        }

        $originalUserData = $user->toArray();

        if ($user->id === Auth::id() && Auth::user()->role === 0) {
            if ($request->has("role") && $request->input("role") === "1") {
                return redirect()
                    ->back()
                    ->withErrors([
                        "role" =>
                            "You cannot change your own role to sub-admin.",
                    ]);
            }
        }

        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $user->id,
            "role" => "required|in:0,1",
            "description" => "nullable|string",
            "phone_number" => "nullable|string|max:255",
            "barangay" => "nullable|string|max:255",
            "password" => "nullable|string|min:8",
        ]);

        $user->name = $validatedData["name"];
        $user->email = $validatedData["email"];
        $user->role = $validatedData["role"];
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
                ->route("user-management")
                ->with("success", "User updated successfully");
        } else {
            return redirect()
                ->route("user-management")
                ->with("info", "No changes were made");
        }
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route("user-management")
                ->with("error", "User not found");
        }

        return view("pages.user-management.edit-user", compact("user"));
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()
                ->route("user-management")
                ->with("error", "User not found");
        }

        $user->delete();

        return redirect()
            ->route("user-management")
            ->with("danger", "User \"$user->name\" deleted successfully");
    }
}
