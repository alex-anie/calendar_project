<?php require_once '../controllers/more.php' ?>

<form action="" method="POST" class="max-w-xl mx-auto p-4 bg-white rounded shadow space-y-4">
<input type="text" name="first_name" placeholder="First Name" class="w-full border p-2 rounded" value="<?=htmlspecialchars($first_name)?>">
    <?php if(!empty($error_statement['first_name'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['first_name']?></div>
    <?php endif; ?>

  <input type="text" name="last_name" placeholder="Last Name" class="w-full border p-2 rounded" value="<?=htmlspecialchars($last_name)?>">
   <?php if(!empty($error_statement['last_name'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['last_name']?></div>
    <?php endif; ?>

  <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded" value="<?=htmlspecialchars($email)?>">
   <?php if(!empty($error_statement['email'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['email']?></div>
    <?php endif; ?>
   <?php if(!empty($error_statement['duplicate'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['duplicate']?></div>
    <?php endif; ?>

  <input type="text" name="numbers" placeholder="Phone Number" class="w-full border p-2 rounded" value="<?=htmlspecialchars($numbers)?>">
    <?php if(!empty($error_statement['numbers'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['numbers']?></div>
    <?php endif; ?>

  <input type="date" name="date_of_birth" class="w-full border p-2 rounded" value="<?=htmlspecialchars($dob)?>">
   <?php if(!empty($error_statement['date_of_birth'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['date_of_birth']?></div>
    <?php endif; ?>

  <input type="number" name="age" placeholder="Age" class="w-full border p-2 rounded" value="<?=htmlspecialchars($age)?>">
   <?php if(!empty($error_statement['age'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['age']?></div>
    <?php endif; ?>

  <input type="url" name="website_url" placeholder="Website URL" class="w-full border p-2 rounded" value="<?=htmlspecialchars($website_url)?>">
   <?php if(!empty($error_statement['website_url'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['website_url']?></div>
    <?php endif; ?>

<input type="url" name="social_profile" placeholder="Social Profile (e.g. Twitter)" class="w-full border p-2 rounded" value="<?=htmlspecialchars($social_profile)?>">
<?php if(!empty($error_statement['social_profile'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['social_profile']?></div>
<?php endif; ?>


  <select name="country" class="w-full border p-2 rounded" value="<?=htmlspecialchars($country)?>">
    <option value="">Select Country</option>
    <option value="nigeria" <?= $country === 'nigeria' ? 'selected' : '' ?>>Nigeria</option>
    <option value="usa" <?= $country === 'usa' ? 'selected' : '' ?>>USA</option>
    <option value="germany" <?= $country === 'germany' ? 'selected' : '' ?>>Germany</option>
  </select>
<?php if(!empty($error_statement['country'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['country']?></div>
<?php endif; ?>

  <select name="city" class="w-full border p-2 rounded" value="<?=htmlspecialchars($city)?>">
    <option value="">Select City</option>
    <option value="lagos" <?= $city === 'lagos' ? 'checked' : '' ?>>Lagos</option>
    <option value="new_york" <?= $city === 'new_york' ? 'checked' : '' ?>>New York</option>
    <option value="berlin" <?= $city === 'berlin' ? 'checked' : '' ?>>Berlin</option>
  </select>
 <?php if(!empty($error_statement['city'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['city']?></div>
<?php endif; ?>

  <input type="text" name="zip_code" placeholder="ZIP Code" class="w-full border p-2 rounded" value="<?=htmlspecialchars($zip_code)?>">
  <?php if(!empty($error_statement['zip_code'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['zip_code']?></div>
<?php endif; ?>

  <div>
    <label class="block">Currency</label>
    <label><input type="radio" name="currency" value="usd" <?= $currency === 'usd' ? 'checked' : '' ?>> USD</label>
    <label><input type="radio" name="currency" value="eur" <?= $currency === 'eur' ? 'checked' : '' ?>> EUR</label>
    <label><input type="radio" name="currency" value="ngn" <?= $currency === 'ngn' ? 'checked' : '' ?>> NGN</label>
  </div>
  <?php if(!empty($error_statement['currency'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['currency']?></div>
  <?php endif; ?>

  <div>
    <label><input type="checkbox" name="terms" <?= $terms ? 'checked' : '' ?>> Accept Terms and Conditions</label>
  </div>
 <?php if(!empty($error_statement['terms'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['terms']?></div>
  <?php endif; ?>

  <textarea name="message" rows="4" placeholder="Enter a message..." class="w-full border p-2 rounded"><?=htmlspecialchars($message)?></textarea>
  <?php if(!empty($error_statement['message'])): ?>
        <div class="text-red-500 text-[14px]"><?=$error_statement['message']?></div>
  <?php endif; ?>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit</button>
</form>

