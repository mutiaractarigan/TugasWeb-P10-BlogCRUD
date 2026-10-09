# TugasWeb-P10-BlogCRUD

Tugas Rutin 10 — Blog CRUD dengan Laravel 13.

## Fitur

- CRUD post (tambah, lihat, edit, hapus)
- Validasi dengan pesan error per field + old input
- Flash message sukses/gagal
- Pagination (5 post per halaman)
- Bonus: pencarian berdasarkan judul / penulis

## Cara Menjalankan

1. Install dependency:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```
2. Buat database `tugasweb_p10` di phpMyAdmin, lalu sesuaikan `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_DATABASE=tugasweb_p10
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Jalankan migration + seeder (15 post dummy):
   ```bash
   php artisan migrate --seed
   ```
4. Jalankan server:
   ```bash
   php artisan serve
   ```
   Buka http://localhost:8000

## Penerapan Requirements

| No | Requirement | File |
|----|-------------|------|
| 1 | `Route::resource('posts')` + named routes | `routes/web.php` (`posts.index`, `posts.create`, `posts.store`, `posts.show`, `posts.edit`, `posts.update`, `posts.destroy`) |
| 2 | PostController resource (7 method) | `app/Http/Controllers/PostController.php` |
| 3 | Blade layout master + `@extends` / `@yield` | `resources/views/layouts/app.blade.php` |
| 4 | Minimal 2 components (Alert, Card) | `resources/views/components/alert.blade.php`, `card.blade.php` |
| 5 | Validasi + error per field + old input | `PostController@store/update`, `resources/views/posts/_form.blade.php` (`@error`, `old()`) |
| 6 | Flash message sukses/gagal | `->with('success' / 'error', ...)` di controller, ditampilkan di layout dengan `<x-alert>` |
| 7 | `@csrf` di semua form + `@method('PUT'/'DELETE')` | `posts/create`, `posts/edit`, tombol hapus di `posts/index` & `posts/show` |
| 8 | Route Model Binding + pagination | `show(Post $post)`, `edit(Post $post)`, dst. + `Post::paginate(5)` |

## Daftar Route

| Method | URL | Name | Method Controller |
|--------|-----|------|-------------------|
| GET | `/posts` | posts.index | index |
| GET | `/posts/create` | posts.create | create |
| POST | `/posts` | posts.store | store |
| GET | `/posts/{post}` | posts.show | show |
| GET | `/posts/{post}/edit` | posts.edit | edit |
| PUT/PATCH | `/posts/{post}` | posts.update | update |
| DELETE | `/posts/{post}` | posts.destroy | destroy |

## Struktur File Penting

```
app/
├── Http/Controllers/PostController.php
└── Models/Post.php
database/
├── migrations/xxxx_create_posts_table.php
├── factories/PostFactory.php
└── seeders/PostSeeder.php
public/css/style.css
resources/views/
├── layouts/app.blade.php
├── components/
│   ├── alert.blade.php
│   └── card.blade.php
└── posts/
    ├── index.blade.php
    ├── create.blade.php
    ├── edit.blade.php
    ├── show.blade.php
    └── _form.blade.php
routes/web.php
```
