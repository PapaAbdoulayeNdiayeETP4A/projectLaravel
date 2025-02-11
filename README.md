# 📱 Documentation de l'Application Laravel 11

## 📝 Introduction

Cette application permet la gestion de smartphones avec **Laravel 11** et **Breeze** pour l'authentification. Elle propose :

- Une interface administrateur pour ajouter, modifier et supprimer des smartphones
- Une interface utilisateur pour consulter la liste des smartphones
- Une authentification sécurisée avec gestion des rôles
- Une interface moderne avec **Tailwind CSS**

---

## ⚙️ Installation & Configuration

### 1️⃣ Cloner le projet

```bash
git clone git@github.com:PapaAbdoulayeNdiayeETP4A/projectLaravel.git
cd projectLaravel
```

### 2️⃣ Installer les dépendances

```bash
composer install
npm install
```

### 3️⃣ Configurer l'environnement

Copie le fichier `.env.example` en `.env` :

```bash
cp .env.example .env
```

Génère une nouvelle clé d'application :

```bash
php artisan key:generate
```

### 4️⃣ Configurer la base de données et la créer avec PhpMyAdmin

Dans `.env`, configure **DB\_CONNECTION, DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD** selon ton environnement.
Puis, exécute pour lancer la migration :

```bash
php artisan migrate
```

Faire le seed de la base de donnes

```bash
php artisan db:seed --class=SmartphoneSeeder
```

*(Cela créera les tables et un compte admin par défaut.)*

### 5️⃣ Lancer l'application

```bash
php artisan storage:link
php artisan serve
npm run dev
```

---

## 🔑 Authentification & Rôles

L'application utilise **Laravel Breeze** pour la gestion des utilisateurs.

### 🏷️ Rôles disponibles :

- **Admin** : peut ajouter, modifier, supprimer et voir tous les smartphones
- **Utilisateur** : peut uniquement consulter la liste des smartphones

### Création d'un compte admin

Un admin est créé automatiquement lors de l'exécution des **seeders**.
Si tu veux en ajouter manuellement, mets `role = 'admin'` dans la table **users**.

### ⚙️ Gestion des rôles dans `User.php`

```php
public function isAdmin(): bool {
    return $this->role === 'admin';
}
```

---

## 📂 Architecture du Projet

```plaintext
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── SmartphoneController.php
│   │   ├── Middleware/
│   │   │   ├── AdminMiddleware.php
│   ├── Models/
│   │   ├── Smartphone.php
│   │   ├── User.php
│   ├── Providers/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── smartphones/
│   │   │   ├── index.blade.php
│   │   │   ├── show.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│
├── routes/
│   ├── web.php
│
├── public/
│   ├── storage (lien vers storage/app/public)
│
├── storage/
│   ├── app/
│   │   ├── public/
│
├── tailwind.config.js
├── package.json
├── composer.json
├── .env
```

---

## 🛠️ Routes & Fonctionnalités

### 🌍 Routes web (définies dans `routes/web.php`)

```php
Route::get('/', [SmartphoneController::class, 'index']); // Accueil
Route::get('/smartphones/{id}', [SmartphoneController::class, 'show']); // Détails

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('smartphones', SmartphoneController::class)->except(['index', 'show']);
});
```

### 🔒 Middleware Admin (`AdminMiddleware.php`)

```php
public function handle(Request $request, Closure $next) {
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        return redirect('/')->with('error', 'Accès refusé.');
    }
    return $next($request);
}
```

---

## 🖥️ Frontend avec Tailwind CSS

### 📜 Liste des Smartphones (`index.blade.php`)

```blade
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($smartphones as $smartphone)
    <div class="bg-white p-6 shadow-md rounded-lg hover:shadow-lg">
        <img src="{{ asset('storage/' . $smartphone->photo) }}" alt="{{ $smartphone->nom }}" class="w-full h-56 object-cover rounded-md">
        <h2 class="text-xl font-semibold text-gray-900">{{ $smartphone->nom }}</h2>
        <p class="text-gray-500">{{ $smartphone->marque }}</p>
        <p class="text-lg font-semibold text-gray-700">${{ $smartphone->prix }}</p>
        <a href="{{ route('smartphones.show', $smartphone->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:brightness-90">Voir</a>
    </div>
    @endforeach
</div>
```

---

## 🚀 Déploiement

### 1️⃣ Générer les assets Tailwind

```bash
npm run build
```

### 2️⃣ Configurer Laravel pour production

```bash
php artisan config:cache
php artisan route:cache
php artisan optimize
```

### 3️⃣ Déployer sur un serveur

Si tu utilises **Apache** :

```plaintext
<VirtualHost *:80>
    DocumentRoot "/var/www/html/public"
    <Directory "/var/www/html">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Et **Nginx** :

```plaintext
server {
    listen 80;
    server_name ton-domaine.com;
    root /var/www/html/public;
    index index.php index.html;
}
```

---

## 🎯 Conclusion

Cette documentation couvre **toutes les fonctionnalités de l'application**, de l'installation au déploiement. 🚀

Tu peux maintenant gérer et améliorer ton projet facilement ! 🎉

