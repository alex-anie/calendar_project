<?php require_once '../controllers/media.php';?>

<form action="" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto p-4 bg-white rounded shadow space-y-4">
  <label class="block">
    <span class="text-gray-700 font-semibold">Upload File</span>
    <input type="file" name="upload_file" class="mt-2 block w-full border rounded p-2">
  </label>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>

  <?php if (!empty($error_statement)): ?>
    <div class="text-red-500 text-sm space-y-1">
      <?php foreach ($error_statement as $error): ?>
        <div><?= $error ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
    
  <?php if (!empty($success_message)): ?>
    <div class="text-green-600"><?= $success_message ?></div>
  <?php endif; ?>
</form>
