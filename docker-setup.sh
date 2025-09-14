#!/bin/bash

# Docker Setup Script for Company Directory API

echo "🚀 Setting up Company Directory API with Docker..."

# Copy environment file if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
    echo "✅ .env file created from .env.example"
else
    echo "✅ .env file already exists"
fi

# Generate application key
echo "🔑 Generating application key..."
docker-compose run --rm app php artisan key:generate

# Generate JWT secret
echo "🔐 Generating JWT secret..."
docker-compose run --rm app php artisan jwt:secret

# Run migrations
echo "🗄️ Running migrations..."
docker-compose run --rm app php artisan migrate

# Seed database
echo "🌱 Seeding database..."
docker-compose run --rm app php artisan db:seed

echo "🎉 Setup complete!"
echo "📋 Next steps:"
echo "  1. Run: docker-compose up -d"
echo "  2. Open: http://localhost:8000"
echo "  3. Check logs: docker-compose logs -f app"