# Bakuna Tracker - Purok Malicsi

A Laravel presentation-layer project for the Barangay Matina Crossing Health Center. It uses Blade, Tailwind CSS v3, Vite, SQLite, seeded vaccination records, and a small session-based login.

## Seeded login

- Email: `nurse.malicsi@bakuna.test`
- Password: `bakuna2026`

## Run locally

```text
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```

Open `http://127.0.0.1:8000` and sign in with the seeded credentials. For a production-style asset bundle, run `npm run build`.
