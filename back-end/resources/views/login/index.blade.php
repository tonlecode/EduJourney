<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts Khmer (Battambang) -->
  <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Battambang', system-ui, sans-serif;
    }
  </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <!-- Login Card -->
  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-cyan-700 mb-8">ចូលគណនី</h2>

    <form action="/login" method="POST" class="space-y-6">
      @csrf
      @if($errors->has('username'))
      <div class="text-red-500 text-sm mb-4">
        {{ $errors->first('username') }}
      </div>
      @endif
      <!-- Username -->
      <div>
        <label class="block text-cyan-700 mb-2" for="username">អ៊ីម៉ែល</label>
        <input type="email" id="username" name="username" required
          class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-700" placeholder="អ៊ីម៉ែល" />
      </div>

      <!-- Password -->
      <div>
        <label class="block text-cyan-700 mb-2" for="password">លេខសម្ងាត់</label>
        <input type="password" id="password" name="password" required
          class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-700" placeholder="បញ្ចូលលេខសម្ងាត់" />
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit"
          class="w-full bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-3 rounded-lg transition duration-300">ចូល</button>
      </div>

      <!-- Forgot password -->
      <div class="text-center mt-4">
        <a href="https://www.facebook.com/rychetinnocent" class="text-cyan-700 hover:underline">ភ្លេចលេខសម្ងាត់?</a>
      </div>
    </form>
  </div>

</body>

</html>
