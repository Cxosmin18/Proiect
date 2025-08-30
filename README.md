# Restaurant Monte Carlo

Acest proiect reprezintă un site pentru un restaurant, care permite clienților să facă programări online, să acceseze meniurile, să creeze un cont etc. Site-ul este construit folosind HTML, CSS, JavaScript și PHP, iar datele sunt gestionate într-o bază de date MySQL.

## Tehnologii folosite:
- *Frontend*: HTML, CSS, JavaScript
- *Backend*: PHP
- *Baza de date*: MySQL

## Pași pentru a rula proiectul:

1. *Instalare XAMPP*
   - Descarcă și instalează *XAMPP* de pe [apachefriends.org](https://www.apachefriends.org).
   - Activează *Apache* și *MySQL* din panoul de control XAMPP.

2. *Publică fișierele proiectului*:
   - Copiază fișierele din proiect în directorul htdocs din folderul de instalare XAMPP (de obicei C:\xampp\htdocs pe Windows).

3. *Crează baza de date*:
   - Deschide *phpMyAdmin* la [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
   - Creează o bază de date nouă cu numele restaurant sau orice alt nume dorești.
   
4. *Importă fișierul SQL*:
   - Importă fișierul *restaurant.sql* pe care l-am inclus în proiect în phpMyAdmin:
     1. Mergi la phpMyAdmin și selectează baza de date restaurant.
     2. Apasă pe tab-ul *Import*.
     3. Alege fișierul restaurant.sql de pe computerul tău.
     4. Apasă pe *Importă* pentru a importa structura și datele bazei de date.

5. *Configurați conexiunea la baza de date*:
   - Deschide fișierul programare.php (sau orice fișier PHP care gestionează conexiunea la baza de date precum: programari_admin.php, register_process.php).
   - Asigură-te că setările de conexiune sunt corecte:
     php
     $servername = "localhost"; // sau IP-ul serverului de baze de date
     $username = "root";        // sau utilizatorul bazei de date
     $password = "";            // parola pentru utilizatorul bazei de date
     $dbname = "restaurant_db"; // numele bazei de date
     
   - Dacă folosești un server live, va trebui să actualizezi aceste setări cu informațiile corespunzătoare pentru acel server (IP-ul serverului, utilizatorul și parola bazei de date).

6. *Accesarea site-ului*:
   - După ce ai setat baza de date, deschide un browser și accesează [http://localhost/nume_proiect](http://localhost/nume_proiect) pentru a vizualiza site-ul tău, iar nume_proiect este numele pe care il dai pentru proiect sau orice alt nume doresti sa botezi.

## Depanare

- *Probleme de conexiune la baza de date*:
  - Verifică dacă *Apache* și *MySQL* sunt pornite în XAMPP.
  - Asigură-te că ai importat fișierul .sql corect.
  - Verifică setările de conexiune din fișierul de configurare PHP.
  
- *Pagina „Programare” nu se încarcă*:
  - Verifică dacă baza de date este corect importată și dacă tabelul de programări este disponibil.
