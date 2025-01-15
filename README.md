# Calisthenics Community Platform

Welkom bij het Calisthenics Community Platform! Dit project is een Laravel-gebaseerde webapplicatie waarmee gebruikers de wereld van calisthenics kunnen ontdekken, bijdragen aan een groeiende community, en toegang krijgen tot gepersonaliseerde inhoud. Het platform ondersteunt gebruikersauthenticatie, rolgebaseerde toegangscontrole, en biedt dynamische functionaliteiten zoals nieuwsbeheer, profielen, FAQ's, en een gebruiksvriendelijke zoekfunctie.

---

## 📖 Inhoudsopgave
- [✨ Functionaliteiten](#✨-functionaliteiten)
- [⚙️ Installatieproces](#⚙️-installatieproces)
- [🚀 Migratie- en Seederproces](#🚀-migratie--en-seederproces)
- [🖥️ Gebruik](#🖥️-gebruik)
- [📚 Bronnen](#📚-bronnen)
- [🛡️ Licentie](#🛡️-licentie)

---

## ✨ Functionaliteiten
- **Gebruikersauthenticatie:**
  - Registreren, inloggen, wachtwoord herstellen, en uitloggen.
  - 'Remember me'-functionaliteit.
- **Rolgebaseerde autorisatie:**
  - Admins hebben toegang tot gebruikersbeheer en contentmanagement.
  - Gewone gebruikers hebben toegang tot nieuws, profielen, en FAQ's.
- **Nieuwsbeheer:**
  - Nieuwsartikelen toevoegen, bewerken en verwijderen (admin-only).
  - Nieuwsdetails bekijken met reacties van gebruikers.
- **Profielbeheer:**
  - Gebruikers kunnen hun profiel aanpassen met profielfoto, biografie, en geboortedatum.
- **FAQ's:**
  - Dynamisch beheer van veelgestelde vragen.
- **Zoekfunctionaliteit:**
  - Zoek naar gebruikers, nieuws, en FAQ-items.
- **Contactformulier:**
  - E-mails verzenden naar de administrator.
- **Responsief ontwerp:**
  - Gebouwd met **Tailwind CSS** voor een moderne en responsieve UI.

---

## ⚙️ Installatieproces

Volg de onderstaande stappen om het project lokaal te installeren:

1. **Clone de repository:**
   ```bash
   git clone https://github.com/lord-nox/Cali_lara.git
   cd Cali_lara
   
2. **Installeer afhankelijkheden:**
   
   ```bash
   composer install
   npm install && npm run dev
   
3. **Stel het .env-bestand in: Maak een kopie van .env.example en pas de waarden aan:**
   
   ```bash
   cp .env.example .env
   php artisan key:generate

4. **Databaseconfiguratie:**

Maak een SQLite-database aan of configureer je voorkeur (MySQL, PostgreSQL, etc.).
Update je .env-bestand met de juiste databasegegevens.

5. **Link de storage:**
   
   ```bash
   php artisan storage:link

## 🚀 Migratie- en Seederproces

6. **Voer de database-migraties uit:**

   ```bash
   php artisan migrate

7. **Seed de database:**
   ```bash
   php artisan db:seed

8. **Combinatie van migratie en seeding:**
   ```bash
   php artisan migrate --seed

9. **E-mailservice configuratie:**

Update je .env-bestand met de SMTP-instellingen van jouw e-mailserviceprovider. Hier is een voorbeeldconfiguratie:

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_username
    MAIL_PASSWORD=your_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=your_email@example.com
    MAIL_FROM_NAME="Calisthenics Platform"
- MAIL_MAILER: Gebruik smtp voor een standaard e-mailservice.
- MAIL_HOST: Dit is de SMTP-host (bijv. Mailtrap, Gmail, Outlook, enz.).
- MAIL_PORT: De poort voor SMTP-verkeer (bijv. 587 voor Gmail).
- MAIL_USERNAME en MAIL_PASSWORD: Je inloggegevens voor de SMTP-service.
- MAIL_FROM_ADDRESS: Het e-mailadres dat als afzender wordt weergegeven.

---

## 🖥️ Gebruik
Start de ontwikkelserver:

    php artisan serve
    
Toegang tot de applicatie: Open je browser en ga naar http://127.0.0.1:8000.

Admin toegang:

Email: admin@ehb.be
Wachtwoord: Password!321
Openbare toegang: Gebruikers kunnen zich registreren of inloggen om gepersonaliseerde inhoud te bekijken.

## 📚 Bronnen
1. Laravel-documentatie
Officiële documentatie voor Laravel-framework:
https://laravel.com/docs

2. Tailwind CSS-documentatie
Styling en CSS-framework documentatie:
https://tailwindcss.com/docs

3. Composer-documentatie
Dependency management tool voor PHP:
https://getcomposer.org/doc/

4. Node.js-documentatie
Voor de JavaScript-runtime en npm dependency management:
https://nodejs.org/en/docs/

5. PHP-handleiding
Algemene documentatie voor PHP-functies en syntax:
https://www.php.net/manual/en/index.php

6. SQLite-documentatie
Voor databaseconfiguratie en gebruik in Laravel:
https://www.sqlite.org/docs.html

7. Stack Overflow
Algemene hulp en oplossingen voor veelvoorkomende Laravel- en PHP-vragen:
https://stackoverflow.com/

8. GitHub Markdown Guide
Voor het correct formatteren van README.md-bestanden:
https://guides.github.com/features/mastering-markdown/

9. Canvas EHB
Specifieke bronnen en referenties voor je cursusmateriaal en projectvereisten:
https://canvas.ehb.be

---

## 🛡️ Licentie
Dit project is beschikbaar onder de MIT-licentie. Zie het bestand <a href="LICENSE">LICENSE</a> voor meer informatie.
