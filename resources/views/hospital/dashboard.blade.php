<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Portal - Vaccination Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">
    <!-- Top Navbar -->
    <nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <h1 class="text-lg font-semibold">Hospital Portal - Vaccination Management</h1>
      <form action="/logout" method="POST">
    @csrf
    <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm font-medium text-white transition">Logout</button>
</form>
    </nav>

    <main class="max-w-7xl mx-auto p-6">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden p-6">
            <h2 class="text-xl font-bold text-slate-800 mb-4">Assigned Patient Appointments</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 text-sm uppercase tracking-wider">
                            <th class="py-3 px-4">Parent Name</th>
                            <th class="py-3 px-4">Child Name</th>
                            <th class="py-3 px-4">Vaccine</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $app)
                            <tr class="border-b border-slate-100 text-slate-800 text-sm">
                                <td class="py-3 px-4 font-medium">{{ $app->parent_name }}</td>
                                <td class="py-3 px-4">{{ $app->child_name }}</td>
                                <td class="py-3 px-4">{{ $app->vaccine_name }}</td>
                                <td class="py-3 px-4">{{ $app->appointment_date }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                        {{ $app->status == 'Vaccinated' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $app->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <form action="/hospital/appointment/{{ $app->id }}/Vaccinated" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded text-xs font-medium transition">
                                            Mark as Vaccinated
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-slate-500">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>