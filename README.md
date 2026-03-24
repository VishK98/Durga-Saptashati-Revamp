# Durga Saptashati Foundation

Official website for the Durga Saptashati Foundation — a charitable organization focused on education, healthcare, environment, and community welfare.

**Staging URL:** https://wavebroadcast.in/durga-saptashati/

## Tech Stack

- **Backend:** PHP (Custom MVC)
- **Database:** MySQL (PDO)
- **Frontend:** HTML, CSS, JavaScript
- **Server:** Apache (XAMPP / Hostinger)

## Project Structure

```
├── app/                  # Application core
│   ├── config/           # Configuration & DB connection
│   ├── controllers/      # Route controllers
│   ├── models/           # Database models
│   └── views/            # Frontend templates
│       ├── layout/       # Shared layouts (header, footer)
│       └── pages/        # Page-specific views
├── admin/                # Admin panel
│   ├── controllers/      # Admin controllers
│   └── views/            # Admin templates
├── public/               # Public-facing pages & assets
│   └── assets/           # CSS, JS, images
├── routes/               # Route definitions
├── js/                   # Global JavaScript
├── mail/                 # Contact form handler
├── .env.example          # Environment template
└── default.php           # Hostinger default page
```

## Getting Started

### Prerequisites

- PHP 7.4+
- MySQL 5.7+
- Apache with mod_rewrite (XAMPP recommended for local dev)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/Durga-Saptashati-Revamp.git
   ```

2. Copy the environment file and configure it:
   ```bash
   cp .env.example .env
   ```

3. Update `.env` with your database credentials and settings.

4. Import the database schema (if available) into MySQL.

5. Point your Apache virtual host or XAMPP to the project directory.

6. Visit `http://localhost/Durga-Saptashati-Revamp/public/` in your browser.

## Configuration

All sensitive configuration is managed via the `.env` file. See [.env.example](.env.example) for required variables.

## License

All rights reserved. This project is proprietary to the Durga Saptashati Foundation.
