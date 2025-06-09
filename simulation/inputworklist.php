<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Information Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="flex flex-col gap-10 w-full justify-center items-center mt-20 mb-20">

    <!-- ✅ Simple Menu Bar -->
    <nav class="max-w-4xl w-full  bg-white shadow mb-0">
        <div class="max-w-4xl mx-auto px-4 py-4 flex justify-start space-x-10">
            <div class="text-lg font-medium">Worklist</div>
            <a href="listarchive.php" class="text-blue-600 hover:underline text-lg font-medium">ECG Archive</a>
        </div>
    </nav>

    <div class="w-full max-w-4xl p-8 bg-white rounded-2xl shadow-xl">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Patient Information Form</h2>
        <?php
        // Generate random values
        $randomAccession = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $randomPatientID = "AC" . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        // Default values
        $prefill = [
            "AccessionNumber" => $randomAccession,
            "PatientID" => $randomPatientID,
            "scheduledAET" => "CARDIO1",
            "examRoom" => "Poli01",
            "ReferringPhysician" => "dr. Eko N."
        ];

        $fields = [
            "AccessionNumber" => "No Pemeriksaan",
            "PatientID" => "No Rekam Media",
            "Forename" => "Nama Depan",
            "Surname" => "Nama Belakang",
            "Gender" => "Jenis Kelamin",
            "Weight" => "Berat (kg)",
            "DateOfBirth" => "Tanggal Lahir",
            "scheduledAET" => "Kode Alat",
            "examRoom" => "Ruang Pemeriksaan",
            "ReferringPhysician" => "Nama Dokter"
        ];

        // Fields that are required
        $requiredFields = ["Forename", "Surname", "Gender", "DateOfBirth"];
        ?>

        <form method="post" action="submitworklist.php" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($fields as $name => $label): ?>
                <div>
                    <label for="<?= $name ?>" class="block text-lg font-medium text-gray-700 mb-1">
                        <?= $label ?>
                        <?php if (in_array($name, $requiredFields)): ?>
                            <span class="text-red-500">*</span>
                        <?php endif; ?>
                    </label>

                    <?php
                    $value = $prefill[$name] ?? '';
                    $requiredAttr = in_array($name, $requiredFields) ? 'required' : '';
                    ?>

                    <?php if ($name === "Gender"): 
                        $checkedM = ($value === 'M') ? 'checked' : '';
                        $checkedF = ($value === 'F') ? 'checked' : '';
                    ?>
                        <div class="flex items-center space-x-6 mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="Gender" value="M" <?= $checkedM ?> required class="form-radio h-6 w-6 text-blue-600">
                                <span class="ml-2 text-lg text-gray-700">Male</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="Gender" value="F" <?= $checkedF ?> required class="form-radio h-6 w-6 text-pink-600">
                                <span class="ml-2 text-lg text-gray-700">Female</span>
                            </label>
                        </div>

                    <?php elseif ($name === "DateOfBirth"): ?>
                        <input type="date" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" <?= $requiredAttr ?> class="w-full h-14 text-lg px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <?php elseif ($name === "Weight"): ?>
                        <input type="number" step="0.1" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" class="w-full h-14 text-lg px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <?php else: ?>
                        <input type="text" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>" <?= $requiredAttr ?> class="w-full h-14 text-lg px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <div class="md:col-span-2">
                <button type="submit" class="w-full py-4 text-lg font-semibold bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <div class="w-full max-w-4xl p-10 bg-white rounded-2xl shadow-xl">
      <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Reset Worklist</h2>    
      <form 
        method="post" 
        action="resetworklist.php" 
        class="grid grid-cols-1 md:grid-cols-2 gap-6"
        onsubmit="return confirm('Are you sure you want to reset the worklist ?');"
        >
            <div class="md:col-span-2">
                <button type="submit" class="w-full py-4 text-lg font-semibold bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150">
                    Reset Worklist
                </button>
            </div>
      </form>
    </div>
  </div>
</body>
</html>
