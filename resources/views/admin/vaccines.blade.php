<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Manage Vaccines</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">

    <!-- Top Navbar -->
    <nav class="bg-slate-950 border-b border-slate-800 px-8 py-4 flex justify-between items-center">
        <h1 class="text-lg font-bold">Admin Portal - Vaccine Management</h1>
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded text-sm font-medium transition">Logout</button>
        </form>
    </nav>

    <!-- Main Content Grid -->
    <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Add Vaccine Form Section (Left Column) -->
        <div class="bg-white text-slate-800 p-6 rounded-xl shadow-sm border border-slate-200 h-fit">
            <h2 class="text-xl font-bold mb-4">Add New Vaccine</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-3 py-2 rounded mb-4 text-xs">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ url('/admin/vaccines/store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Vaccine Name</label>
                    <input type="text" name="vaccine_name" placeholder="e.g., Polio Booster" required class="w-full p-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                    <select name="status" class="w-full p-2 border border-slate-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                        <option value="Available">Available</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white py-2 rounded-lg text-sm font-medium transition">
                    Add Vaccine
                </button>
            </form>
        </div>

        <!-- Vaccine Inventory Table Section (Right 2 Columns) -->
        <div class="md:col-span-2 bg-white text-slate-800 p-6 rounded-xl shadow-sm border border-slate-200">
            <h2 class="text-xl font-bold mb-6">Vaccine Inventory Status</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200 text-slate-600 text-sm">
                            <th class="py-3 px-4">Vaccine Name</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($vaccines ?? [] as $vac)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4 font-medium">{{ $vac->vaccine_name }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                        {{ strtolower($vac->status) == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $vac->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <form action="{{ url('/admin/vaccines/delete/' . $vac->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-medium transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-slate-400">No vaccines listed yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>