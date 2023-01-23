# govAssist-Test

Coding challenge for GovAssist

# Auth Setup

composer require laravel/ui  
php artisan ui bootstrap --auth
php artisan migrate
npm install
npm run dev

# Url Model Setup

php artisan make:model URL -mcr

# create model, controller and migrations

# For Running the Project, following command should be run in sequence in different terminal windows

npm run dev
php artisan serve
php artisan schedule:run
