<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: monospace, 'Times New Roman';
    }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-100 via-gray-200 to-lavender-100 min-h-screen flex items-center justify-center text-gray-900">

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border-black" style="border-width:3px;">
    
    <!-- Header -->
    <div class="flex flex-col items-center mb-6">
      <div class="bg-black rounded-full p-3 shadow-md border-4 border-black">
        <i class="fa-solid fa-user-graduate text-white text-3xl"></i>
      </div>
      <h2 class="text-2xl font-bold text-black mt-3">Student Registration</h2>
      <p class="text-gray-600 text-sm">Register your account today</p>
    </div>

    <!-- Form -->
    <form action="<?=site_url('users/create')?>" method="POST" class="space-y-5">
      
      <!-- First Name -->
      <div>
        <label class="block text-black mb-1 font-medium">First Name</label>
        <div class="flex items-center border-2 border-black rounded-xl bg-white px-3">
          <i class="fa-solid fa-user text-[#8B4513] mr-2"></i>
          <input type="text" name="first_name" placeholder="Enter your first name" required
                 class="w-full px-2 py-3 bg-white text-black focus:outline-none">
        </div>
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-black mb-1 font-medium">Last Name</label>
        <div class="flex items-center border-2 border-black rounded-xl bg-white px-3">
          <i class="fa-solid fa-user text-blue-500 mr-2"></i>
          <input type="text" name="last_name" placeholder="Enter your last name" required
                 class="w-full px-2 py-3 bg-white text-black focus:outline-none">
        </div>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-black mb-1 font-medium">Email Address</label>
        <div class="flex items-center border-2 border-black rounded-xl bg-white px-3">
          <i class="fa-solid fa-envelope text-red-500 mr-2"></i>
          <input type="email" name="email" placeholder="john.doe@example.com" required
                 class="w-full px-2 py-3 bg-white text-black focus:outline-none">
        </div>
      </div>

      <!-- Sign Up Button -->
      <button type="submit"
              class="w-full bg-[#C8A2C8] text-black font-semibold py-3 rounded-xl border-2 border-black shadow-lg transition duration-300 hover:bg-[#B0E0E6] hover:text-black">
        <i class="fa-solid fa-user-plus mr-2"></i> Register/Sign up
      </button>

    </form>
  </div>
</body>
</html>
