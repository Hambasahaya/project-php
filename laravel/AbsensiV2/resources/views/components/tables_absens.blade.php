@foreach($data ?? [] as $allabsen)

@php
$status = strtolower($allabsen->status);
$statusColors = [
'sakit' => 'bg-red-100 text-red-800',
'cuti' => 'bg-blue-100 text-blue-800',
'hadir' => 'bg-green-100 text-green-800',
'izin' => 'bg-yellow-100 text-yellow-800',
];
$badgeClass = $statusColors[$status] ?? 'bg-gray-100 text-gray-800';
@endphp
<tr class="border-t hover:bg-gray-50">
    <td class="px-4 py-2">{{ $allabsen->tanggal_absen }}</td>
    <td class="px-4 py-2">{{ $allabsen->jam_masuk }}</td>
    <td class="px-4 py-2">{{ $allabsen->jam_pulang ?? 'belum absen pulang' }}</td>
    <td class="px-4 py-2">{{ $allabsen->user->nama }}</td>
    <td class="px-4 py-2">
        <span class="inline-block px-3 py-1 rounded-full text-xs font-medium {{ $badgeClass }}">
            {{ ucfirst($allabsen->status) }}
        </span>
    </td>
</tr>
@endforeach