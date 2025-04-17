# Podcast Platform Backend API

This project provides the backend API for a podcast platform, built with Laravel. It follows modern development standards and best practices to support a scalable and maintainable architecture. The API powers core pages such as the landing page, category listings, podcast detail, and episode detail views.

## Features

- RESTful API using Laravel best practices
- Clean and modular architecture
- Pagination, sorting, and filtering for list endpoints
- Eloquent relationships: Podcasts, Episodes, Categories
- API Resource responses for structured and consistent output
- Form Request validations to ensure data integrity
- Comprehensive error handling
- Interactive API documentation (Swagger or Postman)
- Dockerized setup for local development and deployment simulation

## Supported Pages

This backend supports functionality for the following pages based on the Figma design:

1. **Landing Page** – Displays podcasts and featured content
2. **Categories Page** – Lists podcast categories with filtering
3. **Podcast Page** – Shows podcast details and associated episodes
4. **Episode Page** – Shows detailed view of a single episode

## Technologies Used

- Laravel 10+
- PHP 8.1+
- MySQL / PostgreSQL
- Docker & Docker Compose
- Swagger / Postman (for API documentation)

## Getting Started

### Prerequisites

- Docker and Docker Compose installed
- Make (optional, for command shortcuts)

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/podcast-platform-backend.git
    cd podcast-platform-backend
    ```

2. Copy the example environment file:
    ```bash
    cp .env.example .env
    ```

3. Build and run the Docker containers:
    ```bash
    docker compose -f docker-compose.yaml up --build
    ```

## API Documentation

Interactive API documentation is available via:

- **Postman Collection**: 

Documentation includes:

- Endpoint descriptions
- Request/response examples
- Error handling formats

## Project Structure

- `app/Models/` - Eloquent models for Podcasts, Episodes, Categories
- `app/Http/Controllers/Api/` - RESTful controllers for resources
- `app/Http/Requests/` - Form request validations
- `app/Http/Resources/` - API Resource classes
- `routes/api.php` - API route definitions
- `database/factories/` - Model factories for testing
- `database/seeders/` - Database seeders