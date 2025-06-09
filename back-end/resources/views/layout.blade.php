<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard-Admin</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Battambang', system-ui, -apple-system, sans-serif;
    }
  </style>
</head>

<body class="min-h-screen bg-gray-100">

  <!-- Main Layout -->
  <div class="flex w-full min-h-screen">

    <!-- Sidebar -->
    <div id="sidebar" class="bg-cyan-900 text-white w-[18rem] p-4 flex flex-col justify-between transition-all duration-300">
      <div class="space-y-6">
        <div class="text-center text-2xl font-bold">EduJourney</div>
        <form action="/logout" method="POST" class="hidden" id="logoutForm">
          @csrf
        </form>

        <!-- Navigation -->
        <nav id="sidebar-links" class="flex flex-col gap-4">
          <a href="/" data-link="/" class="sidebar-link flex items-center gap-3 hover:bg-cyan-700 p-2 rounded-md transition-all">
            <i class="bi bi-house text-xl"></i><span class="label">ផ្ទាំងគ្រប់គ្រង</span>
          </a>

          <a href="/dashboard/typeOfContents" data-link="/dashboard/typeOfContents" class="sidebar-link flex items-center gap-3 hover:bg-cyan-700 p-2 rounded-md transition-all">
            <i class="bi bi-tags-fill text-xl"></i><span class="label">ប្រភេទមាតិកា</span>
          </a>

          <a href="/dashboard/users" data-link="/dashboard/users" class="sidebar-link flex items-center gap-3 hover:bg-cyan-700 p-2 rounded-md transition-all">
            <i class="bi bi-people-fill text-xl"></i><span class="label">អ្នកប្រើប្រាស់</span>
          </a>

          <button onclick="document.getElementById('logoutForm').submit()" class="flex items-center gap-3 hover:bg-cyan-700 p-2 rounded-md transition-all text-left w-full text-red-500">
            <i class="bi bi-box-arrow-right text-xl"></i><span class="label">ចាកចេញ</span>
          </button>
        </nav>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 w-full p-8">
      @yield('content')
    </div>

  </div>

  <!-- Scripts -->
  <script>
    // Highlight active sidebar link
    document.addEventListener('DOMContentLoaded', function () {
      const links = document.querySelectorAll('.sidebar-link');
      const currentPath = window.location.pathname;

      links.forEach(link => {
        if (link.getAttribute('data-link') === currentPath) {
          link.classList.add('bg-cyan-700', 'font-bold');
        }
      });

      // Also allow clicking to change active manually
      links.forEach(link => {
        link.addEventListener('click', function () {
          links.forEach(l => l.classList.remove('bg-cyan-700', 'font-bold'));
          this.classList.add('bg-cyan-700', 'font-bold');
        });
      });
    });
  </script>

</body>

</html>
