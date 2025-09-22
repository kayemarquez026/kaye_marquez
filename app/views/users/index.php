<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: monospace, 'Times New Roman';
    }
    /* Delete button hover effect for icon */
    .delete-btn:hover i {
      color: white !important;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-100 via-gray-200 to-lavender-100 text-gray-900">

  <!-- Navbar -->
  <nav class="bg-white/50 backdrop-blur-md shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-xl font-bold text-black flex items-center gap-2 font-mono">
        <i class="fa-solid fa-users text-black text-lg"></i> User Directory
      </h1>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl border-black" style="border-width:3px;">
    <form method="get" action="<?=site_url()?>" class="mb-4 flex justify-end">
    <input 
      type="text" 
      name="q" 
      value="<?=html_escape($_GET['q'] ?? '')?>" 
      placeholder="Search student..." 
      class="px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500 w-64">
    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg shadow transition-all duration-300">
      <i class="fa fa-search"></i>
    </button>
  </form>

      <!-- Add New User -->
      <div class="flex justify-end mb-6">
        <a href="<?=site_url('users/create')?>"
           class="inline-flex items-center gap-2 bg-white hover:bg-[#C8A2C8] text-black font-semibold px-5 py-2 rounded-xl shadow-lg transition duration-300 hover:text-black border-2 border-black">
          <i class="fa-solid fa-user-plus text-black text-lg"></i> Add New User
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-2xl border-2 border-black shadow-lg">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-[#C8A2C8] text-white text-sm uppercase tracking-wide">
              <th class="py-3 px-4"><i class="fa-solid fa-hashtag text-white text-lg"></i> ID</th>
              <th class="py-3 px-4"><i class="fa-solid fa-user text-white text-lg"></i> Lastname</th>
              <th class="py-3 px-4"><i class="fa-solid fa-user text-white text-lg"></i> Firstname</th>
              <th class="py-3 px-4"><i class="fa-solid fa-envelope text-white text-lg"></i> Email</th>
              <th class="py-3 px-4"><i class="fa-solid fa-gear text-white text-lg"></i> Action</th>
            </tr>
          </thead>
          <tbody class="text-gray-900 text-sm">
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="transition duration-200">
                <td class="py-3 px-4 font-medium"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['last_name']);?></td>
                <td class="py-3 px-4"><?=($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-[#C8A2C8]/20 text-[#4B0082] text-sm font-semibold px-3 py-1 rounded-full">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                  <!-- Update Button -->
                  <a href="<?=site_url('users/update/'.$user['id']);?>"
                     class="bg-white border-2 border-black hover:bg-[#C8A2C8] hover:text-white text-black font-semibold px-3 py-1 rounded-xl shadow flex items-center gap-1 transition duration-200">
                    <i class="fa-solid fa-pen-to-square text-black text-lg"></i> Update
                  </a>
                  <!-- Delete Button -->
                  <a href="<?=site_url('users/delete/'.$user['id']);?>"
                     class="delete-btn bg-white border-2 border-black hover:bg-red-500 hover:text-white text-red-500 px-3 py-1 rounded-xl shadow flex items-center gap-1 transition duration-200">
                     <i class="fa-solid fa-trash text-red-500 text-lg"></i> Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="mt-4 flex justify-center">
        <?=$page ?? ''?>
    </div>
  </div>
</body>
</html>