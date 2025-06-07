<?php
$directory = __DIR__ . '/../archive'; // Adjust path if needed
$files = [];

if (is_dir($directory)) {
    $files = array_diff(scandir($directory), ['.', '..']);
} else {
    echo "The /archive folder does not exist.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archived Files</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-20">
    <!-- ✅ Simple Menu Bar -->
    <nav class="max-w-4xl mx-auto  bg-white shadow mb-8">
        <div class="max-w-4xl mx-auto px-4 py-4 flex justify-start space-x-10">
            <a href="inputworklist.php" class="text-blue-600 hover:underline text-lg font-medium">Worklist</a>
            <div class="text-lg font-medium">ECG Archive</div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Files in <code>/archive</code></h1>

        <?php if (empty($files)): ?>
            <p class="text-gray-500">No files found in the archive.</p>
        <?php else: ?>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b text-gray-700">
                        <th class="py-2 px-4">#</th>
                        <th class="py-2 px-4">Filename</th>
                        <th class="py-2 px-4">Size (KB)</th>
                        <th class="py-2 px-4">Last Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_values($files) as $index => $file): ?>
                        <?php
                        $filePath = $directory . '/' . $file;
                        $sizeKB = round(filesize($filePath) / 1024, 2);
                        $modified = date("Y-m-d H:i:s", filemtime($filePath));
                        $urlEncodedFilename = urlencode($file);
                        ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4"><?= $index + 1 ?></td>
                            <td class="py-2 px-4">
                                <a href="display.php?filename=<?= $urlEncodedFilename ?>" class="text-blue-600 hover:underline" target="_blank">
                                    <?= htmlspecialchars($file) ?>
                                </a>
                            </td>
                            <td class="py-2 px-4"><?= $sizeKB ?></td>
                            <td class="py-2 px-4"><?= $modified ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
