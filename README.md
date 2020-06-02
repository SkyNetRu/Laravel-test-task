
create .env from .env.example

```
composer install
php artisan key:generate
php artisan migrate:refresh --seed
```

Task 1 => /countryusers
Task 2 => /pdf

1. There are a few models. User, Country, and Company.

Company is related to just one Country
User can be associated with a few Companies
Company can be associated with a few users.

Please create relationships and a query that will get us all users who is associated with companies in a given country. We will also need to display all company names the users associated with and dates when a user was associated with a company.

All we have is a country name:

$country = 'Canada';

No need to create views and other redundant files, routes etc. Please create a controller method and other files for the task.



2. Create a feature that will handle a simple PDF file upload.

If the file is not PDF, return 422 error.

If the file doesn't contain the word "Proposal", just ignore the PDF.

If it's a PDF file, check if we already have the file with the same name and size (the `name` and `size` columns in our DB table). If we have it, we'll need to update the existing one instead of creating a new record for the file.

No need to create an actual view here. Also, no need to create an actual working code that would parse the PDF. Just use pseudocode for this (but just for this part), something like:

$this->pdfService->searchFor('Proposal')
