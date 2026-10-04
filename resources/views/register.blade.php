<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VaxCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleFields() {
            let role = document.getElementById('role').value;
            let hospitalFields = document.getElementById('hospital-fields');
            if (role === 'hospital') {
                hospitalFields.style.display = 'block';
            } else {
                hospitalFields.style.display = 'none';
            }
        }
    </script>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen py-12">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md border border-slate-200">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Create an Account</h2>

       <form action="/register" method="POST" class="space-y-4">
            @csrf
            <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div>
                <label class="block text-sm font-medium text-slate-700">Registering As</label>
                <select name="role" id="role" onchange="toggleFields()" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="parent">Parent</option>
                    <option value="hospital">Hospital</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Full Name / Hospital Name</label>
                <input type="text" name="name" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Email Address</label>
                <input type="email" name="email" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" required class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <!-- Extra fields shown only if Hospital is selected -->
            <div id="hospital-fields" style="display: none;" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Hospital Address</label>
                    <textarea name="address" class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Location Area / City</label>
                    <input type="text" name="location" class="mt-1 w-full p-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <button type="submit" class="w-full py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Register</button>
        </form>

        <p class="mt-4 text-center text-sm text-slate-600">
            Already have an account? <a href="/login" class="text-blue-600 font-medium hover:underline">Sign In</a>
        </p>
    </div>
</body>
</html>