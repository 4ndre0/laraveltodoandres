<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\UserNotification;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.usuarios', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => bin2hex(random_bytes(30)), // también genera 60 caracteres

    ]);

    // Enviar notificación
    $user->notify(new UserNotification());

    return redirect("/login");
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    // Solo actualiza la contraseña si se ingresó una nueva
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect('/usuarios')->with('success', 'Usuario actualizado correctamente');
}
    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    $user = User::find($id);
    if ($user) {
        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    } else {
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }
}

public function search(Request $request)
{
    $query = $request->input('q');
    $users = User::where('name', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->get();

    return view('users.usuarios', compact('users'));
}
public function showSearchForm()
{
    $user = null;
    return view('users.search', compact('user'));
}

public function searchById(Request $request)
{
    $user = User::find($request->id);
    return view('users.search', compact('user'));
}
}
