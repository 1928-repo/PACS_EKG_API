# REST API untuk Interfacing ke PACS-EKG

## Worklist

URL: `https://pacs-ekg/api.php`

METHOD: `GET`

Fungsi dari endpoint API ini adalah untuk mengambil daftar worklist (dari Database atau sumber data lainnya) dan mengembalikan data tersebut dalam format JSON seperti pada contoh berikut ini :

    [
        {
            "AccessionNumber": "1234567",
            "PatientID": "AC98765",
            "Forename": "Dian",
            "Surname": "Utami",
            "Gender": "F",
            "Weight": "75",
            "DateOfBirth": "1995-04-20",
            "scheduledAET" => "CARDIO1",
            "examRoom" => "Room 202",
            "ReferringPhysician": "dr. John Doe",
        },
        {
            "AccessionNumber": "123768",
            "PatientID": "123456",
            "Forename": "Ali",
            "Surname": "Armandi",
            "Gender": "M",
            "Weight": "65",
            "DateOfBirth": "2001-11-15",
            "scheduledAET" => "CARDIO1",
            "examRoom" => "Room 202",
            "ReferringPhysician": "dr. Abdullah Suherman",
        },
        {
            "AccessionNumber": "123909",
            "PatientID": "45677",
            "Forename": "Sandra",
            "Surname": "Omaswati",
            "Gender": "F",
            "Weight": "56",
            "DateOfBirth": "2004-06-25",
            "scheduledAET" => "CARDIO1",
            "examRoom" => "Room 202",
            "ReferringPhysician": "dr. Abdullah Suherman",
        }
    ]

AccessionNumber untuk setiap worklist adalah identifier UNIK yang membedakan antara satu entry worklist dengan entry lainnya. AccessionNumber ini akan digunakan dalam file DICOM/PDF hasil pemeriksaan EKG, sehingga dari setiap file DICOM/PDF yang dikembalikan oleh EKG dapat diketahui berasal dari entry worklist yang mana.

Aplikasi PACS-EKG akan memanggil endpoint worklist ini secara periodik (polling) untuk kemudian mengirimkan worklist dalam format DICOM MWL (Modality Worklist) ke alat EKG.

## Archive (DICOM / PDF File)

URL: `https://pacs-ekg/api.php`

METHOD: `POST`

Fungsi dari API endpoint ini adalah untuk Menerima file hasil pemeriksaan EKG dalam bentuk format Dicom dan PDF. Kedua file ini akan dikirimkan oleh PACS-EKG dalam bentuk Base64 encoded JSON. Selain file hasil pemeriksaan, PACS-EKG juga akan mengirimkan beberapa metadata seperti AccessionNumber, Nama Pasien, StudyInstanceUID, dan lain-lain.

Jika berhasil, endpoint ini akan mengembalikan kode status HTTP 200 (OK).

Format JSON :

    {
          "AccessionNumber": "1234567",
          "StudyInstanceUID": "1.2.840.113564.1234.1954.123456.123456",
          "PatientID": "AC98765",
          "PatientName": "Dian Utami",
          "PatientBirthDate": "1995-04-20",
          "PatientSex": "F",
          "DateOfBirth": "1995-04-20",
          "StudyDate": "2024-06-25",
          "StudyTime": "12:30:00",
          "AcquisitionDateTime": "2024-06-25 12:30:00",
          "pdfFile": "JVBERi0xLjcKCjQgMCBvYmoKKElkZW50aXR5KQplbmRvY...",
          "dicomFile": "PgpzdHJlYW0KeJzsfQlgVNXV7n3vZmsZCOsCWQmMx..."
    }
