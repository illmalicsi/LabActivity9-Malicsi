@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="space-y-8">
        <header class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-orange-700">Health center dashboard</p>
                <h1 class="mt-1 text-3xl font-bold tracking-tight text-slate-900">{{ $title }}</h1>
                <p class="mt-2 text-slate-600">Keep every family on schedule for their next dose.</p>
            </div>
            <a href="{{ route('schedule') }}" class="rounded-lg bg-orange-700 px-4 py-2 text-center text-sm font-semibold text-white hover:bg-orange-800">
                View full schedule
            </a>
        </header>

        <div class="grid gap-4 md:grid-cols-4">
            @foreach ($stats as $stat)
                <x-stat-card :title="$stat['label']" :value="$stat['value']" />
            @endforeach
        </div>

        @if ($alerts->isNotEmpty())
            <div class="rounded-lg border border-amber-200 bg-amber-50 p-4 text-amber-900">
                <p class="font-semibold">{{ $alerts->count() }} overdue {{ Str::plural('vaccination', $alerts->count()) }} need attention.</p>
                <p class="mt-1 text-sm">Please contact the resident and arrange a new appointment.</p>
            </div>
        @elseif ($schedules->isEmpty())
            <div class="rounded-lg border border-blue-200 bg-blue-50 p-4 text-blue-900">
                No schedules have been added yet.
            </div>
        @else
            <div class="rounded-lg border border-orange-200 bg-orange-50 p-4 text-orange-900">
                All clear: no overdue vaccinations today.
            </div>
        @endif

        <x-panel title="Upcoming vaccination schedule">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[42rem] text-left text-sm">
                    <thead class="text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="pb-3 pr-4">#</th>
                            <th class="pb-3 pr-4">Resident</th>
                            <th class="pb-3 pr-4">Vaccine</th>
                            <th class="pb-3 pr-4">Date</th>
                            <th class="pb-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($schedules as $schedule)
                            <tr class="{{ $loop->odd ? 'bg-slate-50' : '' }}">
                                <td class="py-3 pr-4 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="py-3 pr-4 font-medium">{{ $schedule->patient_name }}<span class="block text-xs font-normal text-slate-500">{{ $schedule->purok }}</span></td>
                                <td class="py-3 pr-4">{{ $schedule->vaccine }}<span class="block text-xs text-slate-500">{{ $schedule->dose }}</span></td>
                                <td class="py-3 pr-4">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                                <td class="py-3">
                                    @unless ($schedule->status === 'Overdue')
                                        <span class="rounded-full bg-orange-100 px-2.5 py-1 text-xs font-semibold text-orange-800">{{ $schedule->status }}</span>
                                    @else
                                        <span class="rounded-full bg-red-100 px-2.5 py-1 text-xs font-semibold text-red-800">Overdue</span>
                                    @endunless
                                </td>
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
