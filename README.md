# TP8DPBO2025C1

# Janji
Saya Naeya Adeani Putri dengan NIM 2304017 mengerjakan Tugas Praktikum Latihan 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
![Screenshot 2025-05-01 175946](https://github.com/user-attachments/assets/81455f05-635d-45cd-a6eb-087ef761fdc3)

### Tabel `course`
Menyimpan data kursus yang tersedia.

| Kolom         | Tipe Data     | Keterangan                          |
|---------------|---------------|--------------------------------------|
| `id`          | int           | Primary key, auto-increment         |
| `course_name` | varchar(100)  | Nama kursus                         |
| `description` | text          | Penjelasan mengenai kursus          |

---

### Tabel `student`
Menyimpan data mahasiswa yang mendaftar ke kursus.

| Kolom       | Tipe Data    | Keterangan                                     |
|-------------|--------------|-------------------------------------------------|
| `id`        | int          | Primary key, auto-increment                    |
| `name`      | varchar(100) | Nama mahasiswa                                 |
| `nim`       | varchar(50)  | Nomor Induk Mahasiswa                         |
| `phone`     | varchar(20)  | Nomor telepon (opsional)                       |
| `join_date` | date         | Tanggal bergabung                              |
| `course_id` | int          | Foreign key → mengacu ke `course.id`           |

---

## Relasi Antar Tabel

```text```
course (1) ------< student (many)

---

## Alur Sistem Pendaftaran Mahasiswa ke Kursus

### Langkah-langkah Alur Proses

#### 1. Admin Menambahkan Kursus
- Admin menginput kursus baru (nama dan deskripsi) melalui sistem.
- Data ini disimpan ke tabel `course`.
- Kursus tersebut akan muncul dalam daftar pilihan bagi mahasiswa saat pendaftaran.

Contoh:
Admin menambahkan kursus bernama `Dasar Pemrograman Java`.

---

#### 2. Mahasiswa Mengisi Formulir Pendaftaran
- Mahasiswa membuka form pendaftaran.
- Mereka mengisi data berikut:
  - `Nama`
  - `NIM`
  - `Nomor Telepon` (opsional)
  - `Tanggal Pendaftaran`
  - `Kursus yang dipilih` (dari daftar kursus)

---

#### 3. Sistem Menyimpan Data Mahasiswa
- Data mahasiswa disimpan ke tabel `student`.
- `course_id` diisi dengan ID kursus yang dipilih oleh mahasiswa.

Contoh data tersimpan:
```sql
name = 'Dina'
nim = '2023001'
phone = '081234567890'
join_date = '2025-05-01'
course_id = 1
```

# Dokumentasi
https://github.com/user-attachments/assets/3d85b424-8272-498c-98a7-4212473570e0
