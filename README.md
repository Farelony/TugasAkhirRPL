# Aplikasi Berbasis Web Plantae untuk jual beli tanaman hias
Aplikasi ini berjalan pada framework codeIgniter 4.0.4 

## Instalasi
1. Download dan extract zip di folder tujuan anda
2. Update dependencies dengan cara menuliskan syntax ```composer update```pada terminal 
3. Jalankan webserver anda (XAMPP atau MAMP)
4. Start Apache dan MySQL service
5. Rubah file env menjadi ```.env```
6. Pada file ```.env``` atau ```App/Config/Database``` rubah baris ```username```,```password```, serta ```database``` sesuai dengan peraturan phpmyadmin anda serta nama database yang akan anda gunakan nanti
7. jalankan ```php spark migrate``` untuk melakukan migrasi database
8. jalankan ```php spark serve``` untuk menjalankan aplikasi menggunakan localhost
