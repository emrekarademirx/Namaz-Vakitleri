# Namaz Vakitleri Uygulaması

Bu uygulama, kullanıcının konumundan en yakın şehir için namaz vakitlerini çeker ve görüntüler. Aynı zamanda kullanıcıya şimdiki vakit hakkında bilgi verir.

## Gereksinimler
- PHP 7.0 veya üstü
- MySQL veritabanı
- [php-geoip](https://github.com/maxmind/GeoIP2-php) kütüphanesi

## Kurulum
1. `prayer_times.sql` dosyasını kullanarak veritabanınızı oluşturun.
2. `config.php` dosyasındaki veritabanı ayarlarını kendi ayarlarınıza göre düzenleyin.
3. `index.php` dosyasını sunucunuza yükleyin ve tarayıcınızda açın.

## Kullanım
1. Tarayıcınızda `index.php` dosyasını açın.
2. Kullanıcının konumundan en yakın şehir için namaz vakitleri ve şimdiki vakit görüntülenir.

## Lisans
Bu proje [MIT lisansı](https://github.com/emrekarademirx/Namaz-Vakitleri/blob/main/LICENSE) altındadır.
