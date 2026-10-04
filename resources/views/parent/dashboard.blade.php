<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Portal - E-Vaccination System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Parent Portal</h1>
        <div class="flex items-center space-x-4">
            <span>Welcome, {{ session('name') }}</span>
            <a href="/login" class="bg-red-500 px-3 py-1 rounded text-sm hover:bg-red-600 transition">Logout</a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto p-6 space-y-6">
        @if(session('success'))
            <div class="p-4 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Add Child Profile Section -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-bold text-slate-800 mb-4">Add Child Profile</h2>
                <form action="/parent/child/store" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Child's Full Name</label>
                        <input type="text" name="child_name" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Date of Birth</label>
                        <input type="date" name="date_of_birth" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Gender</label>
                        <select name="gender" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Save Child Profile</button>
                </form>
            </div>

            <!-- Book Hospital Appointment Section -->
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h2 class="text-lg font-bold text-slate-800 mb-4">Book Hospital Schedule</h2>
                <form action="/parent/appointment/store" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Select Child</label>
                        <select name="child_id" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            @if(isset($children) && count($children) > 0)
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}">{{ $child->child_name }}</option>
                                @endforeach
                            @else
                                <option value="">Please add a child first</option>
                            @endif
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Hospital Name / Location</label>
                        <input type="text" name="hospital_name" placeholder="e.g., City Care Pediatrics" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Vaccine Name</label>
                        <input type="text" name="vaccine_name" placeholder="e.g., Polio & BCG Booster" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Appointment Date</label>
                        <input type="date" name="appointment_date" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <button type="submit" class="w-full py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition">Book Schedule</button>
                </form>
            </div>
        </div>

        <!-- Registered Children & Status List -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-lg font-bold text-slate-800 mb-4">My Children & Vaccination Status Report</h2>
            @if(isset($children) && count($children) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-100 text-slate-700 text-sm">
                                <th class="p-3 border-b">Child Name</th>
                                <th class="p-3 border-b">Date of Birth</th>
                                <th class="p-3 border-b">Gender</th>
                                <th class="p-3 border-b">Report / Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-slate-600">
                            @foreach($children as $child)
                                <tr class="border-b hover:bg-slate-50">
                                    <td class="p-3 font-medium text-slate-800">{{ $child->child_name }}</td>
                                    <td class="p-3">{{ $child->dob }}</td>
                                    <td class="p-3">{{ $child->gender }}</td>
                                    <td class="p-3">
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-semibold">Active Tracker</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-slate-500 text-sm">No child profiles found.</p>
            @endif
        </div>
    </div>
</body>
</html>