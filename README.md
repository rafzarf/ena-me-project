## How to Git
## Getting Started
```
git clone https://github.com/rafzarf/ena-me-project.git
git cd ena-me-project
git checkout [working branch]
```
Untuk working branch sendiri, silahkan pilih sesuai fitur yang ingin dikerjakan  
Kita akan menggunakan git flow, jadi ada 2 branch penting yaitu: `trunk` dan `development`  
`trunk` adalah branch utama atau production release, sedangkan `development` adalah branch branch pengembangan atau "next release"  
Git flow sendiri mempunyai beberapa branch prefix, yaitu `feature`, `bugfix`, `release`, `hotfix`, dan `support`.

## Alur kerja
Sebelum mulai bekerja
```
git fetch -> untuk memeriksa apakah ada update terkini
git pull origin [working branch] -> untuk mengambil updatean terbaru dari repo sesuai working branch
[optional] jika ingin mengambil seluruh updatean, gunakan git pull saja
```
---
Setelah selesai bekerja
```
git add . -> untuk memasukan semua perubahan ke stagging
git commit -m "[pesan commit]" -> masuk ke commit, dan memberi nama perubahannya
```
Aturan pesan commit:
- Jelas, sesuai dengan perubahan yang dilakukan. Contoh: `menambahkan button login di landing page` jangan hanya `menambahkan button` atau `mengubah button.kt` saja. Aturannya *perubahan + fitur + spesifik*
- Ringkas, tidak terbelit-belit dan langsung to the point, sehingga orang yang melihat pesannya bisa langsung paham
- (Opsional) Deskripsi, tapi ini sulit dilakukan dan ada trik tertentu jika menggunakan Bash, strukturnya `git commit -m "(judul commit)" -m "(deskripsi commit)"`  

Ketika sudah yakin dengan perubahan yang dilakukan
```
git push origin [working branch] -> mengirim perubahan ke repo sesuai working branch
```
---
Beres, jika ingin bekerja lagi, ulangi langkah-langkahnya dari awal.

## Catatan
Struktur branch sendiri, untuk fitur adalah `feature/(spesifik)`. Kita tidak menggunakan branch per-path karena menggunakan git flow, jadi ketika selesai, semua perubahan fitur akan dikirim ke branch develop  
Sehingga perlu mengontak masing-masing reviewer sebelum mulai bekerja di salah satu fitur untuk dibuatkan branch fiturnya  

---

## MINGGU KE-3
## Enterprise ME

```
backend : code igniter 4 latest ver
frontend : bootstrap 5 latest ver
```
# Yang Sudah Dilakukan di Minggu ke-3
1. frontend done
2. backend baru jadi di spk aja, buat form2 lain silahkan contoh form spk, udh bisa CRUD , passing data nya silahkan diliat, form kalau kepanjangan pake fungsi multi step silahkan diliat di folder js

## NOTE MINGGU KE - 4 dst (kasih emot kalau sudah done)
1. wajib benerin ERD Sampai tuntas,
kolom kolom yang ada di databse itu tulisan2 / item yang kita isi pada form fisik (yang penting aja dan wajib ada) , ini semua harus ada di database soalnya kalau gak lengkap jadi bolak balik lagi, harus lengkap soalnya biar bisa export pdf dengan layout sama persis kaya form fisik. diusahakan minggu ke - 4 beres.
2. tiap minggu usahakan 1 backend form beres (optional buat minggu ke-4 ) kalau mau beresin ERD sampai tuntas gkpp kalau gak ke backend , tapi gathering info nya harus tuntas, sama gathering info printilan yang ada di logbook.
3. Usahain Komunikasi berpusat ke Mas / Pak Yogi, yang hadir ke sidang kan beliau, jadi cukup beliau aja biar gak pusing ada 2 pendapat, soalnya kalau ngikutin mas/pak andri nanti keteter pas di mas/pak yogi nya.
4. animasi mesin diganti visualisasi tracking SPK / Proses produksi di workshop ME, gathering info tata letak mesin di workshop ME, buat top view workshop ME gausah detail cukup kotak2 aja kasih nama2 mesin.
4. Gathering info yg ada di logbook info lengkap kontak hapis (untuk minggu ke - 4)
5. kalau ada penulisan script yang berulang & kurang efektif silahkan dibuat function

## NOTE FEATURE
1. dashboard
```
a. problem di google api calendar, cuman bertahan sampe beberapa hari, sisanya kehilangan akses & gkbisa liat event
b. grafik jam permesinan harus include sleuruh mesin , pakai properti select option contoh mesin cnc , mesin bor dst
c. pertimbangkan info lain yang diperlukan ditampilkan di dashboard
```

3. spk
```
a. popup validasi gambar belum dibuat fitur jika ada , maka tampilkan link verifikasi yang sudah di input, jika tidak tampilkan input text untuk menginput
b. optional searchbox belum ajax jadi perlu reload page , dan kadang pas reload ada notif ganggu resubmit form ?
c. kode no spk, penawaran & order masih seadanya soalnya infonya itu didapat dari BPU , kita gabisa ujuk2 bikin, tapi karena blm integrasi jd dibuat ala ala dulu
```

4. order
```
a. backend total belum
```

5. proses
```
a. backend total belum
b. cari library js buat half circle diagram / chart untuk proses
```

4. permesinan
```
a. backend belum total
b. penulisan menu masih kurang efektif, harusnya list mesin konek ke database , tinggal pake looping , tapi karena data mesinnya belum ada sementara gitu dulu buat preview biar kebayang
```

5. gudang
```
a.backend belum total
```

6. login & hierarcy sistem
```
a. belum total
b. cari info tentang program penambahan role
```
