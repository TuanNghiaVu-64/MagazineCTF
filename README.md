# MagazineCTF

A multi-level Capture The Flag (CTF) lab designed to teach web application security vulnerabilities. This CTF challenges participants to exploit various security flaws in a blog/comment system application to retrieve hidden flags.

## Description

MagazineCTF is a progressive web security CTF consisting of three levels, each with increasing difficulty. The application simulates a blog platform with a comment system that allows users to post comments and upload files. Each level contains intentional security vulnerabilities that participants must identify and exploit to retrieve the flag.

### Features

- **Comment System**: Users can post anonymous comments with optional file attachments
- **File Upload**: Limited file upload functionality with extension filtering
- **Multi-language Support**: Cookie-based language selection (English/Vietnamese)
- **Admin Panel**: Restricted admin interface for configuration management
- **Database-driven Configuration**: Dynamic configuration stored in MySQL database

### Challenge Levels

- **Level 1**: Basic web vulnerabilities (Port: 8091)
- **Level 2**: Intermediate security challenges (Port: 8092)
- **Level 3**: Advanced exploitation techniques (Port: 8093)

## Tech Stack

### Backend
- **PHP 7.3**: Server-side scripting language
- **Apache**: Web server
- **MySQL 8.0**: Relational database management system
- **PDO**: PHP Data Objects for database interactions

### Frontend
- **Bootstrap 4**: CSS framework with custom dark theme
- **HTML5**: Markup language
- **JavaScript**: Client-side scripting

### Infrastructure
- **Docker**: Containerization platform
- **Docker Compose**: Multi-container orchestration
- **Ubuntu**: Base operating system (Level 2)

### Architecture

**Level 1 & Level 3:**
- Two-container setup (web + database)
- PHP 7.3 Apache container
- Separate MySQL 8.0 container
- Network communication between containers

**Level 2:**
- Single-container setup
- Ubuntu-based image with Apache, PHP, and MySQL
- All services running in one container

## Setup Guide

### Prerequisites

- Docker (version 20.10 or higher)
- Docker Compose (version 1.29 or higher)
- Git (optional, for cloning the repository)

### Installation Steps

1. **Clone or download the repository**
   ```bash
   git clone <repository-url>
   cd MagazineCTF
   ```

2. **Navigate to the desired level**
   ```bash
   cd lvl1  # or lvl2, lvl3
   ```

3. **Build and start the containers**
   ```bash
   docker-compose up --build -d
   ```

4. **Verify the containers are running**
   ```bash
   docker-compose ps
   ```

5. **Access the application**
   - Level 1: http://localhost:8091
   - Level 2: http://localhost:8092
   - Level 3: http://localhost:8093

### Database Configuration

The database is automatically initialized with the following default settings:

- **Database Name**: `blog`
- **MySQL User**: `newuser`
- **MySQL Password**: `password`
- **Root Password**: `efddc501e4c9aaa7e63854b9ff864a75`

**Note**: These credentials are for educational purposes only. Change them in production environments.

### Stopping the Lab

To stop and remove the containers:

```bash
docker-compose down
```

To stop and remove containers along with volumes:

```bash
docker-compose down -v
```

## Project Structure

```
MagazineCTF/
├── lvl1/
│   ├── database/
│   │   ├── db.sql          # Database schema and initial data
│   │   └── Dockerfile      # MySQL container configuration
│   ├── web/
│   │   ├── Dockerfile      # PHP Apache container configuration
│   │   ├── flag            # Flag file for level 1
│   │   └── html/
│   │       ├── index.php   # Main application entry point
│   │       ├── admin.php   # Admin panel
│   │       ├── database.php # Database connection and helper functions
│   │       ├── lang/       # Language files
│   │       ├── views/      # PHP view templates
│   │       ├── assets/     # CSS and images
│   │       └── upload/     # File upload directory
│   └── docker-compose.yml  # Level 1 orchestration
├── lvl2/
│   └── [similar structure]
├── lvl3/
│   └── [similar structure]
└── README.md
```

## Security Notes

⚠️ **WARNING**: This CTF lab contains intentional security vulnerabilities for educational purposes. 

- **DO NOT** deploy this application in a production environment
- **DO NOT** expose these containers to the public internet without proper network isolation
- This lab is designed for local testing and educational use only
- Always run in isolated environments (Docker networks, VMs, etc.)

## Troubleshooting

### Port Already in Use

If you encounter port conflicts, modify the port mappings in `docker-compose.yml`:

```yaml
ports:
  - "8091:80"  # Change 8091 to an available port
```

### Container Won't Start

1. Check Docker daemon is running:
   ```bash
   docker ps
   ```

2. View container logs:
   ```bash
   docker-compose logs
   ```

3. Rebuild containers:
   ```bash
   docker-compose down
   docker-compose up --build -d
   ```

### Database Connection Issues

- Ensure the database container is fully initialized (wait 10-15 seconds after starting)
- Check environment variables in `docker-compose.yml`
- Verify network connectivity between containers

## Learning Objectives

This CTF lab helps participants learn about:

- File Upload Vulnerabilities
- Local File Inclusion (LFI)
- Remote File Inclusion (RFI)
- Server-Side Request Forgery (SSRF)
- SQL Injection
- Cookie Manipulation
- Path Traversal
- Authentication Bypass

## Contributing

This is an educational CTF lab. Feel free to:
- Report bugs or issues
- Suggest improvements
- Add new challenge levels
- Enhance documentation

## License

This project is intended for educational purposes only.

---

**Happy Hacking!** 🚩

