***

## *SQLi Sleuth*

***

1. Sistem menunjukkan paparan Flight Tracker. User perlu memasukkan nombor tiket.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNRhWUpceMhuh9LwXY0Hno54g2lCk1euNqbIBYoLsVsijoWc1zyq2zNtr96H1Z3PfUAj2GNDmRXLwcUFQOUgqauuuq1Sg5OIJ0fJh8qIExQMPSryg8oZgzVz8uzNwYGXkVFc7oQhlqDYQ1MapWNuWA=w602-h263-s-no-gm)

2. Boleh track guna no tiket : 100082801, 100082802 atau 100082803. Akan keluar paparan biasa tracker.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczMXGws8_WMr4_Evti4WqyWI5L0OhOzECuON7NqVq1a7K0nlzvI8VII1FfsXVSPpy42Ppyxg5R61M0-bbp8eOBFSdwoJY0T1fpMOBzX_EmVCDxX1t316RpyPSN9wYOuv1GOT1E9LXgSsRc7kEhcuGiQ=w602-h323-s-no-gm)

3. Kalau inject disini tak lepas sbb dah set boleh number sahaja. Oleh itu, harus guna BurpSuite.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczMXv_z4frMr5xzmNySQ6jrms9tUNyVCSg1wNyxk0lo7YjzfksbYrl4LkXDiEUDeb3ZciA1k6fRXJT26XzIyZuRTnt1VE8hA5l8KH7tNK2mvNuZWxgnhviXcrGSNcYGor2lJZFoJy_SoMCDWayUERfI=w602-h334-s-no-gm)

4. Buka aplikasi BurpSuite. Tekan proxy, turn on intercept, open browser.
5. Search localhost:8008
6. Tekan forward banyak kali sampai keluar page Flight Tracker.
7. Letak apa2 value di kotak macam gambar atas. Nanti dalam BurpSuite keluar id.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNcoKGt_hox3ZJFd-6qTsF-rPb40OwS2n0soWoVvVjT0oufpoXzfSj6FUFr6Q_G2GHaiwtfM5pgC0573EobyZ0brSW6ENSSB9Ml_PmFrioujy1eto3-YWY4Gb3yuwk5fqIwfdgx1rMRUJqNn5raIfeP=w1163-h635-s-no-gm)

8. Tekan butang action > Send to Repeater.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczPIufFE7huJTmAhOwOVbQbpC5MVNo9bsPHIn4HqKDSPYjTw0cnGctFBr5IAk42ccQCSDr5oONQRZy1vDjarKPSP8rXkH2bZHHiXYlLVItvdaMwC3lott7iOKN4On9yJe2rG2H_J9XWsEs6wD7gpUHQf=w1163-h374-s-no-gm)

9. Ubah id kepada SQL syntax macam dalam gambar. Selagi tak cukup null (mewakili column), akan keluar warning message 'mysql_num_rows' macam gambar dibawah.
 
![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNT32td6O75Lop_qVa3dTGTHs9o8R8O5nnazLfrHjTCxU5BMJ3TLBrnpPc-hf-qhhujbG7yc5g5tPtp1KXzNAFnZJzPj_AbKtUJ57LLL3j1oyw72kJHGc6ZEzIiCR3weihXCpz3aJ3Ci-LJ4_Q__gQu=w896-h727-s-no-gm)

11. Try banyak kali sampai dapat nama semua column dan tak keluar message mysql macam gambar atas. 

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNA2t7ovUwkPlOr7xZPz1F_6jbDsSoDmEhvXNqJ9OwrBuRo53pQr6Kbqg1f5xo5XIEYHAiE5EDk9aCCOxrwF8vkaAnIghyzCoQr6q7VAqIsjBlf0aIjMafD3V4i3GwWkSaMaJ0P1rcT72Z1F7QUIYww=w887-h682-s-no-gm)

11. Tambah @@version pula ganti null yang last, sebab nak tahu jenis dan version of database.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNMXvtNVNkJkCPseH3bIzgz2v_nUXURI5BJoQJtO87jGO1ACRpwlXdIrSHnn0uYplafwRPaYnzCaeaoa-poCK2dtie7hiEVl_0_GX6txVz7BXerA_wXvdBzlMgOCH5HKiss_5jdFvua4yqwJWXZQUj-=w895-h676-s-no-gm)

13. Cari list database  menggunakan command id dibawah. Paparan menunjukkan perkataan admin. 

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczP6D22jb9v6LYZlPZF7cn0T1HGUAdUHjyyzsqb7Niz8Tgk9_-JmjDZDAo6ISMT_ZITkD3G-oTzf8Feiu1bnoOXw0_-OiPofCDYj-z8QvRJZsFdVIlycxt8taqMB6NZGHiamb1nRgN_tJ3lm9pBMCz6G=w1163-h626-s-no-gm)

14. Scroll hingga jumpa suspicious word: fl4g. Boleh search juga dan biasanya ia berada di bahagian bawah.

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczO8Aw7KlYtxA5kNdDrasf-1K1gY2eI7l6hKAj0n6o2un7gvtKdtw7S3tq4eCByoDf8xPddlx8eI7fnsrBXo3RWzGKItw3ndLyfdO8yZjLsqG9JdkYeTaCCgSYbKmm6rRAf02B760-xaSCkYn8QHXJpN=w1163-h543-s-no-gm)

14. apabila sudah peroleh nama table, cari nama column yang ada pula. 
15. Guna command dalam gambar dibawah. 
16. Send dan scroll, cari suspicious word juga: f0undM3. Biasanya terletak di bahagian akhir scroll. 

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNUHjKsPSUlVzeN3kriwx6Hjx5GSsMEFE8v0U2XTCpfhpdtTc_9H7hg8afXmiUvhRF58igYN5KvvmvFA8PBfXtTzMwSFVLM7t0yfDSApj0LL8_qCzVxkMxNWVqkR7rGtKWUHrTg-d6g_p1tJHdFUzW0=w1163-h461-s-no-gm)

17. Apabila sudah tahu nama table dan column, guna command dibawah untuk baca data dalam column target tadi. 
18. Dapat flag. 

![enter image description here](https://lh3.googleusercontent.com/pw/AP1GczNtIQDadjjSI97zxqvaib_qIw-LJ3kl49eRwsMPF9aS4qwWQJREQ10bGMfZ8fhDGzdZdCgzZ-MwiyS47rzIWZXhxa8spANTBx-Q39zMEEZqoETvGdTs2H3wVBJUZaLtqxvnugb_GcC_10GfhCRigtmo=w1163-h445-s-no-gm)


