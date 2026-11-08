# KMS — Portfolio & Blog (Laravel)

Site portfolio + blog développé avec **Laravel 13**, à partir du CV de SODEHOUNDJI Koffi Mokpokpo.
Logo du site : `<KMS/>`.

Design "terminal / éditeur de code" : palette noir-vert profond avec accents jaune ambre et vert menthe, 
typographie mono (JetBrains Mono) + sans-serif (Inter).

---

## 1. Installation

### Prérequis
- **PHP 8.3+**
- **Composer**
- **Node.js & npm** (optionnel, pour les assets si vous utilisez Vite/Laravel Mix)
- Base de données SQLite (par défaut) ou MySQL/PostgreSQL

### Étapes d'installation

```bash
# 1. Se placer dans le dossier du projet
cd kms_laravel

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier .env.example en .env et générer la clé d'application
cp .env.example .env
php artisan key:generate

# 4. Créer la base de données SQLite (si elle n'existe pas)
touch database/database.sqlite

# 5. Exécuter les migrations
php artisan migrate

# 6. (Recommandé) Remplir la base avec les données du CV
php artisan db:seed

# 7. Créer un compte administrateur
php artisan tinker
# Dans le shell Tinker :
# > User::create(['name' => 'Koffi', 'email' => 'admin@example.com', 'password' => 'password123'])
# > exit

# 8. Lancer le serveur de développement
php artisan serve
```

Le site est alors accessible sur **http://127.0.0.1:8000/**
et l'administration sur **http://127.0.0.1:8000/admin/login** (avec les credentials créées à l'étape 7).

---

## 2. Structure du projet

```
kms_laravel/
├── app/
│   ├── Http/Controllers/    (HomeController, ProjectController, BlogController, etc.)
│   ├── Models/               (Project, Post, Category, Skill, Formation, User, ContactMessage)
│   └── Providers/
├── database/
│   ├── migrations/           (schémas des tables)
│   └── seeders/              (données initiales du CV)
├── public/
│   ├── css/style.css        (thème "terminal")
│   └── js/main.js           (navigation, animations, copie e-mail)
├── resources/views/
│   ├── layouts/app.html     (layout principal)
│   ├── home.blade.php       (accueil)
│   ├── about.blade.php      (à propos)
│   ├── projects/            (liste & détail projets)
│   ├── blog/                (liste & détail articles)
│   ├── contact.blade.php    (formulaire contact)
│   ├── auth/login.blade.php (login admin)
│   └── errors/              (404, 500)
├── routes/
│   └── web.php              (toutes les routes)
├── .env.example             (variables d'environnement)
├── composer.json            (dépendances PHP)
└── README.md               (ce fichier)
```

---

## 3. Gestion du contenu

### Via le formulaire de contact
Les visiteurs peuvent envoyer des messages depuis la page Contact.
Les messages arrivent en base de données et sont visibles dans l'admin.

### Via Tinker (shell interactif Laravel)
```bash
php artisan tinker

# Ajouter un projet
> Project::create(['title' => 'Mon app', 'slug' => 'mon-app', 'short_description' => '...', 'description' => '...', 'technologies' => 'Laravel, Vue.js', 'is_featured' => true])

# Ajouter un article
> Category::create(['name' => 'Veille', 'slug' => 'veille'])
> Post::create(['title' => 'Mon article', 'slug' => 'mon-article', 'category_id' => 1, 'excerpt' => '...', 'content' => '...', 'published' => true])

# Voir les projets
> Project::all()
```

### Via l'admin web (à venir)
Un mini dashboard admin existe pour projets, articles et messages. À enrichir avec une interface complète.

---

## 4. Personnalisation

### Informations du site
Modifiez les constantes dans `routes/web.php` ou créez un fichier `config/site.php` :
- Nom complet : SODEHOUNDJI Koffi Mokpokpo
- E-mail : koffimokpokposodehoundji@gmail.com
- Téléphone : +228 70 78 21 33
- Lieu : Lomé, Togo

### Design
- Couleurs, typographies, espacements : `public/css/style.css` (variables CSS en haut)
- Animations & interactions : `public/js/main.js`

### Images
Les images de projets et articles se stockent dans `storage/app/public/` 
et sont servies via `Storage::url()` dans les vues.

---

## 5. Déploiement en production

1. Mettez à jour `.env` :
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `DB_*` : paramètres de votre base de données de production
   - `MAIL_*` : configuration e-mail (pour les notifications)

2. Lancez les migrations sur le serveur de prod :
   ```bash
   php artisan migrate --force
   ```

3. Optimisez l'application :
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

4. Servez avec **Laravel Sail**, **Heroku**, **Railway**, **Render**, **DigitalOcean**, ou tout hébergeur PHP classique.

---

## 6. Dépannage

**"No application encryption key has been specified"**
→ Lancez `php artisan key:generate`

**"SQLSTATE[HY000]: General error: 1 near "CREATE"**
→ Permissions fichier. Assurez-vous que `database/database.sqlite` est accessible en écriture.

**Erreur 500 après déploiement**
→ Vérifiez les logs : `storage/logs/laravel.log`
→ Permiss files : `chmod -R 775 storage bootstrap/cache`

---

Bon développement ! 🚀
