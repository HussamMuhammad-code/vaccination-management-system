<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Date-Wise Report - VacciCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold">Vaccination Date-Wise Report</h1>
                <p class="text-slate-400 text-sm">Admin view for all registered child vaccination appointments.</p>
            </div>
            <a href="/" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition-all">Back to Home</a>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-800 text-slate-400 bg-slate-950/50">
                        <th class="p-4">ID</th>
                        <th class="p-4">Parent Name</th>
                        <th class="p-4">Child Name</th>
                        <th class="p-4">Vaccine Dose</th>
                        <th class="p-4">Hospital</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Date / Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse($reports as $report)
                        <tr class="hover:bg-slate-800/50 transition-all">
                            <td class="p-4 text-slate-400">#{{ $report->id }}</td>
                            <td class="p-4 font-medium">{{ $report->parent_name ?? 'N/A' }}</td>
                            <td class="p-4 text-slate-300">{{ $report->child_name }}</td>
                            <td class="p-4 text-blue-400 font-medium">{{ $report->vaccine_name }}</td>
                            <td class="p-4 text-slate-300">{{ $report->hospital_name ?? 'Default Hospital' }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20 capitalize">
                                    {{ $report->status }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-400 text-xs">{{ $report->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-500">No vaccination reports found in the database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>