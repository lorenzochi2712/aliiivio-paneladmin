<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Muestra todas las citas programadas
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.calendar', compact('appointments'));
    }

    /**
     * Guarda una nueva cita médica
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id ?? null,
            'date' => $request->date,
            'time' => $request->time
        ]);

        return back()->with('success', 'Cita programada correctamente.');
    }
}
