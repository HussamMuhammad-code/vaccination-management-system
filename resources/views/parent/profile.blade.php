<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Profile & Reports - E-Vaccination</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 min-h-screen">
    <nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <h1 class="text-lg font-semibold">Parent Portal - Profile & Reports</h1>
        <div class="flex gap-4">
            <a href="/login" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm font-medium transition">Logout</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-6 space-y-6">
        <!-- Parent Account Info -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <h2 class="text-xl font-bold text-slate-800 mb-4">My Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-slate-700">
                <div>
                    <span class="block text-sm text-slate-500 font-medium">Account Name</span>
                    <span class="text-lg font-semibold text-slate-900">{{ Auth::check() ? Auth::user()->name : 'Parent User' }}</span>
                </div>
                <div>
                    <span class="block text-sm text-slate-500 font-medium">Email Address</span>
                    <span class="text-lg font-semibold text-slate-900">{{ Auth::check() ? Auth::user()->email : 'parent@gmail.com' }}</span>
                </div>
            </div>
        </div>

        <!-- Vaccination Reports / History -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <h2 class="text-xl font-bold text-slate-800 mb-4">Child Vaccination Status & Reports</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100 text-slate-700 text-sm uppercase tracking-wider">
                            <th class="py-3 px-4">Child Name</th>
                            <th class="py-3 px-4">Vaccine Name</th>
                            <th class="py-3 px-4">Appointment Date</th>
                            <th class="py-3 px-4">Vaccination Report Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($reports)
                            @forelse($reports as $rep)
                                <tr class="border-b border-slate-100 text-slate-800 text-sm">
                                    <td class="py-3 px-4 font-medium">{{ $rep->child_name }}</td>
                                    <td class="py-3 px-4">{{ $rep->vaccine_name }}</td>
                                    <td class="py-3 px-4">{{ $rep->appointment_date }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                            {{ $rep->status == 'Vaccinated' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                            {{ $rep->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-6 text-center text-slate-500">No vaccination reports found yet.</td>
                                </tr>
                            @endforelse
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>