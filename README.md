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

# Enterprise ME

```
backend : code igniter 4 latest ver
frontend : bootstrap 5 latest ver
composer latest version
```

## NOTE MINGGU KE - 4 dst (pls update this ASAP)

1. wajib benerin ERD Sampai tuntas,
   kolom kolom yang ada di databse itu tulisan2 / item yang kita isi pada form fisik (yang penting aja dan wajib ada) , ini semua harus ada di database soalnya kalau gak lengkap jadi bolak balik lagi, harus lengkap soalnya biar bisa export pdf dengan layout sama persis kaya form fisik. diusahakan minggu ke - 4 beres.
2. tiap minggu usahakan 1 backend form beres (optional buat minggu ke-4 ) kalau mau beresin ERD sampai tuntas gkpp kalau gak ke backend , tapi gathering info nya harus tuntas, sama gathering info printilan yang ada di logbook.
3. **Usahain Komunikasi berpusat ke Mas / Pak Yogi**, yang hadir ke sidang kan beliau, jadi cukup beliau aja biar gak pusing ada 2 pendapat, soalnya kalau ngikutin mas/pak andri nanti keteter pas di mas/pak yogi nya.
4. animasi mesin diganti visualisasi tracking SPK / Proses produksi di workshop ME, **gathering info tata letak mesin di workshop ME**, buat top view workshop ME gausah detail cukup kotak2 aja kasih nama2 mesin.
5. Gathering info yg ada di logbook info lengkap kontak hapis (untuk minggu ke - 4)
6. **kalau ada penulisan script yang berulang & kurang efektif silahkan dibuat function**

## NOTE FEATURE : 18/04/2024

1. dashboard

```
a. grafik jam permesinan harus include sleuruh mesin , pakai properti select option contoh mesin cnc , mesin bor dst
b. pertimbangkan info lain yang diperlukan ditampilkan di dashboard
```

3. spk

```
done
```

4. Order

```
done
```

5. Proses

```
a. bingung tinggal di proses ini formnya harus gimana [perlu pembicaraan lebih lanjut]
```

4. Permesinan

```
a. untuk input mesin & tipe mesin, serta penulisan mesin yg efektif done. 
b. tinggal buat fitur yang operator.
```

5. Gudang

```
done
```

6. login & hierarcy sistem

```
done
```

7. Visualization

```
a. belum kebayang kaya gimana, tapi perlu cari info tataletak secepatnya
```

untuk relational yang memakai id__worker ditidiakan dulu di db, mengingat kita baru bikin hierarcy sistem di akhir. biar gak error dan gak ribet aja.
