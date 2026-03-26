# MagazineCTF

A multi-level Capture The Flag (CTF) lab designed to teach web application security . This CTF challenges participants to exploit various security flaws in a blog/comment system application to retrieve hidden flags.

## Description

MagazineCTF is a progressive web security CTF consisting of three levels, each requiring combination of different techniques and vulnerabilities to form exploit chain tha will RCE the server and read the flag in the root folder. The application simulates a blog platform with a comment system that allows users to post comments and upload files. Each level contains intentional security vulnerabilities that participants must identify and exploit to retrieve the flag.

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
- **Linux**: Operating system 

## Setup Guide

### Prerequisites

- Docker (version 20.10 or higher)
- Docker Compose (version 1.29 or higher)

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
   docker-compose up --build 
   ```

4. **Access the application**
   - Level 1: http://localhost:8091
   - Level 2: http://localhost:8092
   - Level 3: http://localhost:8093

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

---

**Happy Hacking!** 🚩
