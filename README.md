# Laravel 10 GitHub Login Authentication using Socialite and Breeze

This project demonstrates how to implement GitHub authentication in a Laravel 10 application using Laravel Socialite and Breeze.

## Prerequisites

Before you begin, ensure you have the following:

- PHP and Composer installed on your machine.
- A GitHub account and a GitHub OAuth application for obtaining the client ID and secret.

## Installation

1. Clone this repository to your local machine:

```bash
git clone https://github.com/pawdgreyt/laravel10-authentication-socialite-breeze.git
```
2. Copy the .env.example file to .env:

```bash
cp .env.example .env
```
3. Open the .env file and set your GitHub OAuth application credentials:

```bash
GITHUB_CLIENT_ID=your-github-client-id
GITHUB_CLIENT_SECRET=your-github-client-secret
GITHUB_CALLBACK_URL=http://your-app-url/login/github/callback
```
4. Run the migration to set up the database:

```bash
php artisan migrate
```

