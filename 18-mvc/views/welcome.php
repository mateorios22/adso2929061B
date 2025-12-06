<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="hero bg-base-200 min-h-screen">
  <div class="hero-content text-center">
    <div class="max-w-md">
      <h1 class="text-5xl font-bold">MVC</h1>
      <h3>Model View Controller</h3>
      <!-----  table ----->
      <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach($data as $pokemon): ?>
      <!-- row 1 -->
      <tr>
        <th><?=htmlspecialchars($pokemon['id'])?></th>
        <td><?=htmlspecialchars($pokemon['name'])?></td>
        <td>
            <?php if($pokemon[$pokemon['id']])?>
                <span class="badge badge-outline badge-info">Water</span>
            <?php elseif($pokemon['type'] == 'Grass') ?>
                       <th><?php if($pokemon[$pokemon['id']])?></th>
                <span class="badge badge-outline badge-info">Water</span>
            <?php elseif($pokemon['type'] == 'Grass') ?>
                        <th><?php if($pokemon[$pokemon['id']])?></th>
                <span class="badge badge-outline badge-info">Water</span>
            <?php elseif($pokemon['type'] == 'Grass') ?>
                <span class="badge badge-outline badge-info">Water</span>
        </td>
        <td>
            <a href="" class="link">Show</a>
            <a href="" class="link">Edit</a>
            <a href="" class="link">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
      <?php foreach($data as $pokemon): ?>
      <span class="badge badge-succes">
        <?= htmlspecialchars($pokemon['name']) ?>
      </span><br>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</body>
</html>