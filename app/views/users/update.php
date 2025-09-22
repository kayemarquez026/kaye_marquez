<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-gray-100 via-gray-200 to-[#E6E6FA] min-h-screen flex items-center justify-center font-mono text-gray-900">

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border-[3px] border-black">
    <!-- Heading with Icon -->
    <h2 class="text-2xl font-bold text-center text-black mb-6 flex items-center justify-center gap-2">
      <i class="fa-solid fa-pen-to-square text-black"></i> UPDATE NOW...
    </h2>

    <!-- Notification Message (hidden by default) -->
    <div id="messageBox" class="hidden mb-4 p-3 rounded-lg border-[2px] border-black bg-yellow-100 text-yellow-800 flex items-center gap-2">
      <i class="fa-solid fa-circle-exclamation"></i>
      <span>No changes detected. Your profile was not updated.</span>
    </div>

    <form id="updateForm" action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-4">
      <!-- First Name -->
      <div>
        <label class="block text-gray-800 mb-1 flex items-center gap-2">
          <i class="fa-solid fa-user text-yellow-800"></i> First Name
        </label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="inputField w-full px-4 py-3 bg-white text-black border-[2px] border-black rounded-xl focus:ring-2 focus:ring-[#C8A2C8] focus:outline-none">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-gray-800 mb-1 flex items-center gap-2">
          <i class="fa-solid fa-user text-blue-600"></i> Last Name
        </label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="inputField w-full px-4 py-3 bg-white text-black border-[2px] border-black rounded-xl focus:ring-2 focus:ring-[#C8A2C8] focus:outline-none">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-gray-800 mb-1 flex items-center gap-2">
          <i class="fa-solid fa-envelope text-red-600"></i> Email Address
        </label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="inputField w-full px-4 py-3 bg-white text-black border-[2px] border-black rounded-xl focus:ring-2 focus:ring-[#C8A2C8] focus:outline-none">
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-[#C8A2C8] hover:bg-black hover:text-white text-black font-semibold py-3 rounded-xl border-[2px] border-black shadow-lg transition duration-300 flex items-center justify-center gap-2">
        <i class="fa-solid fa-pen-to-square"></i> Update
      </button>
    </form>
  </div>

  <script>
    const form = document.getElementById("updateForm");
    const inputs = document.querySelectorAll(".inputField");
    const messageBox = document.getElementById("messageBox");

    // Store original values
    const originalValues = {};
    inputs.forEach(input => {
      originalValues[input.name] = input.value;
    });

    form.addEventListener("submit", function(e) {
      let changed = false;

      inputs.forEach(input => {
        if (input.value !== originalValues[input.name]) {
          changed = true;
        }
      });

      if (!changed) {
        e.preventDefault(); // stop form submit
        messageBox.classList.remove("hidden"); // show styled message

        // Auto-hide after 3 seconds
        setTimeout(() => {
          messageBox.classList.add("hidden");
        }, 2000);
      }
    });
  </script>

</body>
</html>
