@extends('layouts.app')

@section('title', 'Vaccination Schedule')

@section('content')
    <div class="space-y-6">
        <header>
            <p class="text-sm font-semibold uppercase tracking-wide text-orange-700">Barangay records</p>
            <h1 class="mt-1 text-3xl font-bold tracking-tight">Vaccination Schedule</h1>
            <p class="mt-2 text-slate-600">A complete list of upcoming and completed resident appointments.</p>
        </header>

        <x-panel title="All scheduled doses">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[48rem] text-left text-sm">
                    <thead class="text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="pb-3 pr-4">Resident</th>
                            <th class="pb-3 pr-4">Purok</th>
                            <th class="pb-3 pr-4">Vaccine / Dose</th>
                            <th class="pb-3 pr-4">Scheduled</th>
                            <th class="pb-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($schedules as $schedule)
                            <tr class="{{ $loop->first ? 'bg-orange-50' : ($loop->odd ? 'bg-slate-50' : '') }}">
                                <td class="py-3 pr-4 font-medium">{{ $schedule->patient_name }}</td>
                                <td class="py-3 pr-4">{{ $schedule->purok }}</td>
                                <td class="py-3 pr-4">{{ $schedule->vaccine }} <span class="text-slate-500">({{ $schedule->dose }})</span></td>
                                <td class="py-3 pr-4">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                                <td class="py-3">{{ $schedule->status }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-8 text-center text-slate-500">No schedules yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-panel>
    </div>
@endsection
