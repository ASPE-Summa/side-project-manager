# Repository Guidelines

## Project Structure & Module Organization
- Laravel 12 app: backend code in `app/` (Controllers, Models, Jobs) with bindings in `config/` and routes in `routes/web.php` and `routes/api.php`.
- Frontend assets live in `resources/js` and `resources/css`; Blade views are in `resources/views`; Vite outputs to `public/` via `npm run build`.
- Database layer sits in `database/migrations` and `database/seeders`; the local SQLite file at `database/database.sqlite` is auto-created by composer scripts.
- Automated tests are under `tests/Feature` and `tests/Unit`; shared setup is in `tests/TestCase.php` with runner config in `phpunit.xml`.

## Build, Test, and Development Commands
- `composer install` and `npm install` to set up dependencies.
- `composer dev` runs `php artisan serve`, `queue:listen --tries=1`, and `npm run dev` concurrently for local development.
- `npm run build` produces production assets with Vite; `npm run dev` runs Vite in watch mode.
- `php artisan migrate` applies schema changes; add `--seed` when you need seeded data.

## Coding Style & Naming Conventions
- Follow PSR-12; run `./vendor/bin/pint` to auto-format PHP. Use 4-space indents in PHP and 2-space indents in JS/CSS.
- Controllers/Models/Jobs use PascalCase; config keys use snake_case; route names use kebab-case. Prefer resource controllers for CRUD flows.
- Keep Blade templates lean; extract shared UI into components/partials under `resources/views`.

## Testing Guidelines
- Primary suite: `composer test` (clears config then runs `php artisan test`). Filter with `php artisan test --filter ClassName`.
- Name test classes with `*Test.php`; describe behaviors with meaningful method names; favor Feature tests for HTTP flows and Unit tests for isolated helpers.
- Use SQLite in memory/file for isolation; add factories in `database/factories` to keep fixtures minimal.

## Commit & Pull Request Guidelines
- Use concise, imperative commit subjects (e.g., "Add project creation endpoint"); include context in the body when touching migrations or queues.
- For PRs, include a summary, linked issue, setup notes (migrations/queues), test evidence (`composer test`, screenshots for UI), and risk/rollback notes.
- Keep changes small and focused; prefer follow-up PRs over large mixed updates.

## Security & Configuration Tips
- Never commit `.env` or secrets; copy `.env.example` and run `php artisan key:generate` locally.
- Rotate credentials when sharing databases/queues; review `config/*.php` defaults before deploying.
- Ensure queues (used in `composer dev`) are backed by a real driver in non-local environments.
