# Interest Matching App

A Laravel thesis project for connecting users through shared interests, with user profiles, matching, posts, private messaging and a multilingual interface.

## Features

- Registration, login and email verification.
- Profile details and onboarding requiring interests and additional user data.
- Matching by age preferences, shared interests and matching city/country, connecting the highest-ranked candidate.
- User posts with like/unlike actions.
- Private message history and read status, with Pusher notifications.
- Polish, English and German translation resources.

## Stack

PHP 8.1+, Laravel 10, Eloquent, MySQL, Blade, Bootstrap, JavaScript, jQuery, SCSS and Vite. Notifications use Pusher, Laravel Echo and pusher-js.

## Local setup

Requires PHP compatible with composer.lock, Composer, Node.js/npm and MySQL.

```sh
composer install
cp .env.example .env
php artisan key:generate
npm ci
```

On PowerShell, use `Copy-Item .env.example .env`. Create an empty database and configure DB_DATABASE, DB_USERNAME and DB_PASSWORD in .env. Configure an email transport for account verification.

```sh
php artisan migrate
php artisan storage:link
npm run build
php artisan serve
```

For frontend development, run `npm run dev` separately.

### Demo data

DatabaseSeeder does not currently populate interests or users. Add local interest records consistent with the interest migration/model and translation keys before completing onboarding. A matching demonstration needs at least two verified users with interests and additional profile details.

### Messaging

Configure PUSHER_APP_ID, PUSHER_APP_KEY, PUSHER_APP_SECRET and PUSHER_APP_CLUSTER for a development Pusher application. Check the corresponding VITE_PUSHER_* values and rebuild frontend assets after changing them. Message persistence and external notifications are separate parts of the controller flow.

## Code map

| Area | Location |
| --- | --- |
| Routes | routes/web.php |
| Matching | app/Http/Controllers/HomeController.php |
| Profile onboarding | app/Http/Middleware/CheckUserInterestData.php |
| Posts | app/Http/Controllers/PostController.php |
| Messages | app/Http/Controllers/ChatController.php |
| Relationships | app/Models/ |
| Database | database/migrations/ |
| Translations | lang/pl/, lang/en/, lang/de/ |

## Project status

Academic thesis project published in 2024. Documentation was checked against the source; a fresh installation and external services have not been verified during this update. Existing tests are Laravel examples rather than coverage of matching and messaging. Dependency and application review are needed before deployment.
