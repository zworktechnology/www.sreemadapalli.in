<?php

namespace App\Http\Controllers;

use App\Mail\InviteMail;
use App\Models\Invite;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class InviteController extends Controller
{
    public function index()
    {
        $data = Invite::all();

        return view('pages.backend.invite.index', compact('data'));
    }

    public function create()
    {
        $data = Role::all();

        return view('pages.backend.invite.create', compact('data'));
    }

    public function store(Request $request)
    {
        do
        {
            $token = Str::random();
        }
        while (Invite::where('token', $token)->first());

        $data = new Invite();

        $data->role_id = $request->get('role_id');
        $data->name = $request->get('name');
        $data->contact = $request->get('contact');
        $data->email = $request->get('email');
        $data->token = $token;

        $data->save();

        Mail::to($request->get('email'))->send(new InviteMail($data));

        return redirect()->route('invite.index')->with('add', 'Successful invite mail send to user !');
    }

    public function accept($token)
    {
        if (!$invite = Invite::where('token', $token)->first())
        {
            abort(404);
        }

        $user = new User();

        $user->email = $invite->email;
        $user->name = $invite->name;
        $user->password = Hash::make('Password@1234');

        $user->save();

        Invite::where('email', $invite->email)
            ->where('token', $token)
            ->update(['invite_accepted_at' => Carbon::now()]);

        $role = Role::find($invite->role_id);

        $user->assignRole($role->name);

        return redirect('login');
    }
}
