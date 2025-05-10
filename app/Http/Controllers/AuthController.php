<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/projects');
        }

        return back()->withErrors(['email' => 'E-mail ou senha incorretos. Tente novamente.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:users', // O campo "email" é obrigatório, deve ser um e-mail válido, com no máximo 255 caracteres e único na tabela "users"
            'password' => 'required|string|min:6|confirmed', // O campo "password" é obrigatório, deve ser uma string com no mínimo 6 caracteres e confirmado
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'name.min' => 'O nome deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser uma string.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso. Por favor, tente outro.',

            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha deve ser uma string.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'As senhas não coincidem. Por favor, tente novamente.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/projects');
    }


    public function editProfile()
    {
        return view('auth.edit', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string válida.',
            'name.min' => 'O nome deve ter pelo menos 5 caracteres.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser uma string válida.',
            'email.email' => 'O e-mail fornecido não é válido.',
            'email.max' => 'O e-mail não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este e-mail já está em uso. Por favor, escolha outro.',
            'password.nullable' => 'A senha é opcional, mas deve ter pelo menos 6 caracteres caso seja fornecida.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'As senhas não coincidem. Por favor, tente novamente.',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->route(route: 'projects.index')->with('success', 'Perfil atualizado com sucesso.');
    }
}
