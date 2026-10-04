<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - E-Vaccination System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-slate-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Portal - Vaccination Management</h1>
           <form action="/logout" method="POST" class="inline">
    @csrf
    <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-1.5 rounded-lg text-sm font-semibold text-white">Logout</button>
</form>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-8 space-y-6">
        @if(session('success'))
            <div class="p-4 bg-green-100 text-green-700 rounded-lg shadow text-sm">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <h2 class="text-lg font-bold text-slate-800 mb-4">Parent Appointment Requests</h2>
            
            @if(isset($appointments) && count($appointments) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 text-slate-600 text-sm">
                                <th class="py-3 px-4">Parent Name</th>
                                <th class="py-3 px-4">Child Name</th>
                                <th class="py-3 px-4">Hospital</th>
                                <th class="py-3 px-4">Vaccine</th>
                                <th class="py-3 px-4">Date</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                    <tbody>
    @foreach($appointments as $app)
        <tr class="border-b border-slate-100 text-slate-800 text-sm">
            <td class="py-3 px-4 font-medium">{{ $app->parent_name ?? 'N/A' }}</td>
            <td class="py-3 px-4">{{ $app->child_name ?? 'N/A' }}</td>
            <td class="py-3 px-4">{{ $app->hospital_name ?? 'N/A' }}</td>
            <td class="py-3 px-4">{{ $app->vaccine_name ?? 'N/A' }}</td>
            <td class="py-3 px-4">{{ $app->appointment_date ?? 'N/A' }}</td>
            <td class="py-3 px-4">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                    {{ strtolower($app->status) == 'approved' ? 'bg-green-100 text-green-700' : (strtolower($app->status) == 'vaccinated' ? 'bg-blue-100 text-blue-700' : (strtolower($app->status) == 'rejected' ? 'bg-red-100 text-red-700' : 'bg-amber-100 text-amber-700')) }}">
                    {{ ucfirst($app->status) }}
                </span>
            </td>
            <td class="py-3 px-4 flex space-x-2">
                @if(strtolower($app->status) == 'pending')
                    <form action="/admin/appointment/{{ $app->id }}/Approved" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs font-semibold">Approve</button>
                    </form>
                    <form action="/admin/appointment/{{ $app->id }}/Rejected" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-semibold">Reject</button>
                    </form>
                @elseif(strtolower($app->status) == 'approved')
                    <form action="/admin/appointment/{{ $app->id }}/Vaccinated" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs font-semibold">Mark Vaccinated</button>
                    </form>
                @else
                    <span class="text-xs text-slate-400 font-medium">Completed</span>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>
                    </table>
                </div>
            @else
                <p class="text-slate-500 text-sm">No appointment requests found.</p>
            @endif
        </div>
    </div>
</body>
</html>