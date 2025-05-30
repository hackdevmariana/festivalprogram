# festivalprogram

FestivalProgram is an open-source platform designed to manage and promote local festivals and events. Its goal is to provide an accessible API so developers can build web or mobile applications without worrying about backend infrastructure.

## Features

- Location management: Regions, provinces, and municipalities.

- Events: Store detailed information about festivals, concerts, fairs, and more.

- Artists & Venues: Manage performers and event spaces.

- Tags & Styles: Advanced classification for easy searches.

- Public API: Easy integration with frontends and mobile apps.

- External integrations: Potential connections with Eventbrite, Google Places, and more.


## Installation

Clone the repository:

``` bash
git clone https://github.com/hackdevmariana/festivalprogram.git
cd festivalprogram
``` 

Install Laravel dependencies:

``` bash
composer install
npm install
``` 

Create the .env file and configure your database:

``` bash
cp .env.example .env
php artisan key:generate
``` 

Run migrations:

``` bash
php artisan migrate
``` 

Start the server:

``` bash
php artisan serve
``` 

## API Endpoints
Example: Fetch all events

``` bash
GET /api/events
``` 

Example: Register a new event

``` bash
POST /api/events
``` 

``` 
Content-Type: application/json
{
  "title": "Fiesta Mayor",
  "date": "2025-07-15",
  "location_id": 3
}
``` 

## Contributions
FestivalProgram is an open-source project under the GPL v3 license. Contributions are welcome! To participate:

Fork the repository.

Create a new branch (git checkout -b feature-new).

Make your changes and commit (git commit -m "New feature").

Submit a pull request.

## License
This project is licensed under GPL v3, ensuring that any modifications or distributions remain open-source.
