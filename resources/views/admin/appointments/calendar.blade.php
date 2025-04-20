@extends('adminlte::page')

@section('title', 'Agenda Médica')

@section('content_header')
    <h1>Agenda Médica</h1>
@endsection

@section('content')
    <div class="calendar-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Citas Programadas</h3>
            </div>
            <div class="card-body">
                @forelse($appointments as $appointment)
                    <div class="card card-appointment">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="appointment-date">Fecha: {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</div>
                                <div class="appointment-time">Hora: {{ $appointment->time }}</div>
                                <div>Médico ID: {{ $appointment->doctor_id }}</div>
                                @if ($appointment->patient_id)
                                    <div>Paciente ID: {{ $appointment->patient_id }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay citas programadas.</p>
                @endforelse
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="card-header">Programar Nueva Cita</div>
            <div class="card-body">
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="doctor_id">ID del Médico</label>
                        <input type="number" class="form-control" name="doctor_id" required>
                    </div>
                    <div class="form-group">
                        <label for="patient_id">ID del Paciente (opcional)</label>
                        <input type="number" class="form-control" name="patient_id">
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Hora</label>
                        <input type="time" class="form-control" name="time" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Guardar Cita</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/appointment.css') }}">
@endsection

@section('js')
    <script>
        console.log('Agenda Médica cargada.');
    </script>
@endsection
