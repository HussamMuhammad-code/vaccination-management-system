<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// 1. Main Front Page (index.blade.php)
Route::get('/', function () {
    return view('index');
});
// 2. Handle Booking Form Submission from Index Page
Route::post('/book-appointment', function (Request $request) {
    // Check if the user is logged in first
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Please login or register to book an appointment.');
    }

    try {
        DB::table('appointments')->insert([
            'parent_name' => $request->parent_name,
            'child_name' => $request->child_name,
            'dob' => $request->dob,
            'vaccine_name' => $request->vaccine_name,
            'hospital_name' => $request->hospital_name,
            'appointment_date' => $request->appointment_date,
            'status' => 'Pending',
            'child_id' => 1,
            'parent_id' => Auth::id(),
        ]);
    } catch (\Exception $e) {
        if (!Illuminate\Support\Facades\Schema::hasTable('appointments')) {
            Illuminate\Support\Facades\Schema::create('appointments', function ($table) {
                $table->id();
                $table->unsignedBigInteger('child_id')->default(1);
                $table->unsignedBigInteger('parent_id')->default(1);
                $table->string('parent_name')->nullable();
                $table->string('child_name')->nullable();
                $table->date('dob')->nullable();
                $table->string('vaccine_name')->nullable();
                $table->string('hospital_name')->nullable();
                $table->date('appointment_date')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });
        }

        DB::table('appointments')->insert([
            'parent_name' => $request->parent_name,
            'child_name' => $request->child_name,
            'dob' => $request->dob,
            'vaccine_name' => $request->vaccine_name,
            'hospital_name' => $request->hospital_name,
            'appointment_date' => $request->appointment_date,
            'status' => 'Pending',
            'child_id' => 1,
            'parent_id' => Auth::id(),
        ]);
    }

    return redirect('/#booking')->with('success', 'Booking request submitted successfully!');
});

    

// 3. Admin Hospital Management
Route::get('/admin/hospitals', function () {
    $hospitals = DB::table('hospitals')->get();
    return view('admin.hospitals', compact('hospitals'));
});

Route::post('/admin/hospitals', function (Request $request) {
    DB::table('hospitals')->insert([
        'name' => $request->name,
        'address' => $request->address,
        'location' => $request->location,
    ]);
    return back()->with('success', 'Hospital added successfully!');
});

Route::post('/admin/hospitals/delete/{id}', function ($id) {
    DB::table('hospitals')->where('id', $id)->delete();
    return back()->with('success', 'Hospital deleted successfully!');
});

// 4. Admin Vaccine Availability
Route::get('/admin/vaccines', function () {
    $vaccines = DB::table('vaccines')->get();
    return view('admin.vaccines', compact('vaccines'));
});
Route::post('/admin/vaccines', function (Request $request) {
    DB::table('vaccines')->insert([
        'vaccine_name' => $request->name,
        'status' => $request->status,
    ]);
    return back()->with('success', 'Vaccine status added successfully!');
});

Route::post('/admin/vaccines/delete/{id}', function ($id) {
    DB::table('vaccines')->where('id', $id)->delete();
    return back()->with('success', 'Vaccine deleted successfully!');
});


Route::get('/parent/dashboard', function () {
    // Fetch children belonging to the logged-in parent
    $children = DB::table('children')->where('parent_id', Auth::id())->get();
    
    return view('parent.dashboard', compact('children'));
})->middleware('auth');

// 6. Admin Reports Page
Route::get('/admin/reports', function () {
    $reports = DB::table('appointments')->orderBy('created_at', 'desc')->get();
    return view('admin.reports', compact('reports'));
  
});  // Admin Dashboard Route
Route::get('/admin/dashboard', function () {
    $appointments = DB::table('appointments')->orderBy('created_at', 'desc')->get();
    return view('admin.dashboard', compact('appointments'));
});

// Admin Appointment Status Update Route
Route::post('/admin/appointment/{id}/{status}', function ($id, $status) {
    DB::table('appointments')
        ->where('id', $id)
        ->update(['status' => $status]);
        
    return back()->with('success', 'Appointment status updated successfully!');
});

Route::get('/parent/dashboard', function () {
    $reports = DB::table('appointments')->get();
    return view('parent.dashboard', compact('reports'));
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});
// Show the registration page
Route::get('/register', function () {
    return view('register');
});

// Handle the registration form submission
Route::post('/register', function (Request $request) {
    DB::table('users')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role ?? 'parent', // defaults to parent role based on your project requirements
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/login')->with('success', 'Account created successfully! Please login.');
});
// Show registration form
Route::get('/register', function () {
    return view('register'); // assuming your file is register.blade.php
});

Route::post('/register', function (Request $request) {
    DB::table('users')->insert([
        'role' => $request->role,
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return redirect('/login')->with('success', 'Account created successfully!');
});
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        $user = Auth::user();
        
        // Redirect based on role
        if (strtolower($user->role) === 'admin') {
            return redirect('/admin/dashboard');
        }
        
        return redirect('/parent/dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
});
Route::post('/parent/child/store', function (Request $request) {
    DB::table('children')->insert([
        'parent_id' => Auth::id(),
        'child_name' => $request->child_name,
        'dob' => $request->date_of_birth, // Maps the form input to the database column name
        'gender' => $request->gender,
    ]);

    return back()->with('success', 'Child profile saved successfully!');
});
// Store a new vaccine
Route::post('/admin/vaccines/store', function (Illuminate\Http\Request $request) {
    DB::table('vaccines')->insert([
        'vaccine_name' => $request->vaccine_name,
        'status' => $request->status ?? 'Available',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return back()->with('success', 'Vaccine added successfully!');
});

// Delete a vaccine
Route::post('/admin/vaccines/delete/{id}', function ($id) {
    DB::table('vaccines')->where('id', $id)->delete();

    return back()->with('success', 'Vaccine removed successfully!');
});