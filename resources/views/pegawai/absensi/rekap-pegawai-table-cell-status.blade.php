@if ($attendance)
@php
    $status = $attendance->where('status', $status)->count();
    $total = $attendance->count();
@endphp
    {{ $status }}&nbsp;
    <span class="text-danger">{{ doubleval($status * 100 / $total) }}%</span>
@endif
