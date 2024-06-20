<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
    $appointments = Appointment::where('user_id', $user->id)->get();
    
    return view('appointment.index', compact('appointments'));
    }
    public function create()
    {
        return view('appointment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointment.index');
    }

    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.show', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointment.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointment.index');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointment.index');
    }
    public function deleteConfirm($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.delete', compact('appointment'));
    }

}
