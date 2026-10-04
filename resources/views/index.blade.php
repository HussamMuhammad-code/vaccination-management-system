<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infant & Child Vaccination Management System</title>
  <meta name="description"
    content="Infant and child vaccination management system, track immunization dates, vaccine stock, and hospital bookings." />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  
  <!-- AOS & Styles -->
  <link rel="stylesheet" href="{{ asset('assets/aos.css') }}" />
  <script src="{{ asset('assets/aos.js') }}"></script>
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/output.css') }}" />
 <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
</head>

<body class="font-body bg-slate-900 text-slate-100">

  <!-- ===================== TOP BAR ===================== -->
  <div class="topbar py-2 text-sm bg-slate-950 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
        <div class="flex items-center gap-6">
          <span class="flex items-center gap-2">
            <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
            <strong class="text-blue-400">Child Immunization Helpline:</strong>
            <a href="tel:+1800555VACC" class="hover:text-blue-400 transition-colors">+1 (800) 555-VACC</a>
          </span>
        </div>
        <div class="flex items-center gap-4 text-slate-400 text-xs">
          <span>Mon–Sat: 8AM – 6PM</span>
          <span>|</span>
          <span class="text-emerald-400 font-medium">E-Vaccination Portal Active</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ===================== NAVBAR ===================== -->
  <nav id="navbar" class="sticky top-0 z-50 bg-slate-900/90 backdrop-blur-md border-b border-slate-800 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16 lg:h-18">
        <!-- Logo -->
        <a href="index.html" class="flex items-center gap-2.5">
          <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
              <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
            </svg>
          </div>
          <div>
            <div class="font-heading font-extrabold text-lg leading-tight text-white">VacciCare</div>
            <div class="text-xs text-slate-400 leading-none">Child Immunization Portal</div>
          </div>
        </a>

    <div class="hidden lg:flex items-center gap-6">
  <a href="#home" class="nav-link text-sm hover:text-blue-400 transition-colors">Home</a>
  <a href="#modules" class="nav-link text-sm hover:text-blue-400 transition-colors">System Modules</a>
  <a href="/admin/vaccines" class="nav-link text-sm hover:text-blue-400 transition-colors">Vaccine Stock</a>
  <a href="/admin/hospitals" class="nav-link text-sm hover:text-blue-400 transition-colors">Hospitals</a>
  <a href="/admin/reports" class="nav-link text-sm hover:text-blue-400 transition-colors text-blue-400 font-medium">Vaccination Reports</a>

</div>

        <!-- Right Actions -->
       
            
        
          </a>
          <!-- Mobile Menu Toggle -->
          <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-300 hover:text-white">
            <i data-lucide="menu" class="w-6 h-6" id="menu-open"></i>
            <i data-lucide="x" class="w-6 h-6 hidden" id="menu-close"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- ===================== HERO ===================== -->
  <section id="home" class="relative flex items-center justify-center pt-12 pb-24 overflow-hidden bg-slate-900">
    <div class="absolute top-20 right-16 w-72 h-72 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 left-10 w-56 h-56 bg-emerald-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Left Content -->
        <div>
          <div class="flex flex-wrap gap-2 mb-6">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20">
              <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> Zero-Miss Immunization Tracker
            </span>
          </div>

          <h1 class="font-heading font-extrabold text-4xl lg:text-5xl text-white leading-tight mb-6">
            Protecting Your Child's Future <br />
            <span class="text-blue-400">One Vaccine At A Time</span>
          </h1>

          <p class="text-slate-300 text-lg leading-relaxed mb-8">
            An efficient e-vaccination management solution ensuring infants and children never miss critical immunization dates. Track vaccine stocks, book hospital appointments, and secure children's health.
          </p>

          <div class="flex flex-wrap gap-4 mb-10">
            <a href="#booking" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-base py-3.5 px-7 rounded-xl transition-all shadow-lg shadow-blue-600/30 flex items-center gap-2">
              <i data-lucide="calendar-plus" class="w-5 h-5"></i>
              Book Vaccination Slot
            </a>
            <a href="#modules" class="bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold text-base py-3.5 px-7 rounded-xl transition-all border border-slate-700 flex items-center gap-2">
              <i data-lucide="info" class="w-5 h-5"></i>
              Explore Modules
            </a>
          </div>

          <!-- Quick Stats -->
          <div class="grid grid-cols-3 gap-6 pt-6 border-t border-slate-800">
            <div>
              <div class="font-heading font-bold text-2xl text-white">100%</div>
              <div class="text-slate-400 text-xs">Digital Record Tracking</div>
            </div>
            <div>
              <div class="font-heading font-bold text-2xl text-white">24/7</div>
              <div class="text-slate-400 text-xs">Parent Notifications</div>
            </div>
            <div>
              <div class="font-heading font-bold text-2xl text-white">Live</div>
              <div class="text-slate-400 text-xs">Hospital Availability</div>
            </div>
          </div>
        </div>

        <!-- Right Graphic / Card -->
        <div class="hidden lg:flex justify-center relative">
          @php
        $latestBooking = DB::table('appointments')->whereNotNull('child_name')->latest()->first();
    @endphp
          <div class="w-full max-w-md bg-slate-800/80 border border-slate-700 rounded-2xl p-6 shadow-2xl backdrop-blur-xl">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-700">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/20 text-blue-400 rounded-xl flex items-center justify-center font-bold">
                  <i data-lucide="syringe" class="w-5 h-5"></i>
                </div>
                <div>
                  <h4 class="font-semibold text-white text-sm">Next Scheduled Dose</h4>
<p class="text-xs text-slate-400">{{ $latestBooking->vaccine_name ?? 'Scheduled Dose' }}</p>
                </div>                  
              </div>
              <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full">On Track</span>
            </div>

            <div class="space-y-4 text-sm">
              <div class="bg-slate-900/50 p-3.5 rounded-xl border border-slate-700/50 flex justify-between items-center">
                <span class="text-slate-400">Registered Child:</span>
                <span class="text-white font-medium">{{ $latestBooking->child_name ?? 'No Booking Yet' }}</span>
              </div>
              <div class="bg-slate-900/50 p-3.5 rounded-xl border border-slate-700/50 flex justify-between items-center">
                <span class="text-slate-400">Assigned Hospital:</span>
               <span class="text-white font-medium">{{ $latestBooking->hospital_name ?? 'N/A' }}</span>
              </div>
              <div class="bg-slate-900/50 p-3.5 rounded-xl border border-slate-700/50 flex justify-between items-center">
                <span class="text-slate-400">Status Update:</span>
               <span class="text-blue-400 font-medium capitalize">{{ $latestBooking->status ?? 'Pending Admin Approval' }}</span>
              </div>
            </div>

            <div class="mt-6">
              <div class="w-full bg-slate-700 rounded-full h-2 overflow-hidden">
                <div class="bg-blue-500 h-full rounded-full" style="width: 75%"></div>
              </div>
              <div class="flex justify-between text-xs text-slate-400 mt-2">
                <span>Dose 3 of 4 Completed</span>
                <span>75% Immunized</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== SYSTEM MODULES ===================== -->
  <section id="modules" class="py-20 bg-slate-900 border-t border-slate-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <span class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 py-1 bg-blue-500/10 rounded-full border border-blue-500/20">Architecture</span>
        <h2 class="font-heading font-bold text-3xl lg:text-4xl text-white mt-3">Core System Modules</h2>
        <p class="text-slate-300 mt-2 max-w-xl mx-auto">Designed for seamless collaboration between Admins, Parents, and Partner Hospitals.</p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Admin Module -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative group hover:border-blue-500/50 transition-all">
          <div class="w-12 h-12 bg-blue-600/20 text-blue-400 rounded-xl flex items-center justify-center mb-5 font-bold">
            <i data-lucide="shield-alert" class="w-6 h-6"></i>
          </div>
          <h3 class="font-heading font-bold text-xl text-white mb-3">Admin Panel</h3>
          <p class="text-slate-400 text-sm mb-4">Oversees infant profiles, checks vaccine stock availability, manages hospital listings, and approves or rejects parent appointment bookings.</p>
          <ul class="space-y-2 text-xs text-slate-300">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> View all child profiles & dates</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Monitor vaccine inventory status</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-blue-400"></i> Add, update, or delete hospitals</li>
          </ul>
        </div>

        <!-- Parent Module -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative group hover:border-blue-500/50 transition-all">
          <div class="w-12 h-12 bg-emerald-600/20 text-emerald-400 rounded-xl flex items-center justify-center mb-5 font-bold">
            <i data-lucide="users" class="w-6 h-6"></i>
          </div>
          <h3 class="font-heading font-bold text-xl text-white mb-3">Parent Portal</h3>
          <p class="text-slate-400 text-sm mb-4">Enables easy registration, tracking of child immunization timetables, hospital selection, and retrieval of vaccination history reports.</p>
          <ul class="space-y-2 text-xs text-slate-300">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-400"></i> Register & maintain child data</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-400"></i> Automated dashboard alerts</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-emerald-400"></i> Book hospital schedule easily</li>
          </ul>
        </div>

        <!-- Hospital Module -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-xl relative group hover:border-blue-500/50 transition-all">
          <div class="w-12 h-12 bg-purple-600/20 text-purple-400 rounded-xl flex items-center justify-center mb-5 font-bold">
            <i data-lucide="hospital" class="w-6 h-6"></i>
          </div>
          <h3 class="font-heading font-bold text-xl text-white mb-3">Hospital Dashboard</h3>
          <p class="text-slate-400 text-sm mb-4">Manages incoming patient appointments dispatched from admin, updates vaccine statuses post-administration, and logs location details.</p>
          <ul class="space-y-2 text-xs text-slate-300">
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> Secure hospital registration</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> Receive approved appointments</li>
            <li class="flex items-center gap-2"><i data-lucide="check" class="w-3.5 h-3.5 text-purple-400"></i> Update vaccination status ("Vaccinated")</li>
          </ul>
        </div>
      </div>
  </section>

  <!-- ===================== BOOKING FORM / PORTAL ===================== -->
  
<!-- ===================== BOOKING FORM / PORTAL ===================== -->
<div class="landing-cta text-center py-5">
    <h2>Manage Your Child's Health Securely</h2>
    <p>Please log in or register to add child profiles and book vaccination appointments.</p>
    <a href="{{ url('/login') }}" class="btn btn-primary">Sign In</a>
    <a href="{{ url('/register') }}" class="btn btn-secondary">Register</a>
</div>
  <!-- ===================== FOOTER ===================== -->
  <footer class="bg-slate-950 border-t border-slate-800 py-12 text-slate-400 text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-2">
        <div class="w-6 h-6 bg-blue-600 rounded flex items-center justify-center text-white text-xs font-bold">V</div>
        <span class="text-white font-bold">VacciCare Systems</span>
      </div>
      <div>&copy; 2026 E-Vaccination Management System. Academic Project.</div>
      <div class="flex gap-4 text-xs">
        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
        <a href="#" class="hover:text-white transition-colors">Admin Login</a>
        <a href="#" class="hover:text-white transition-colors">Hospital Portal</a>
      </div>
    </div>
  </footer>

  <script>
    lucide.createIcons();
  </script>
</body>
</html>