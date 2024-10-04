# Enterprise Automation ME Project Guide

The `ena-me-project` is a system for managing SPK (Sistem Pengelolaan SPK) and the main focus of enterprise automation implementation in the manufacturing engineering department. This project aims to digitalize the manual processes and improve efficiency through enterprise automation. The project will enhance performance, scalability, and maintainability.

## Table of Contents

- [Getting Started](#getting-started)
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Development Workflow](#development-workflow)
- [Notes for Development](#notes-for-development)

---

## Getting Started

To get started with the ena-me-project, follow these steps:

```bash
git clone https://github.com/rafzarf/ena-me-project.git
cd ena-me-project
git checkout [working-branch]
```

- **Working branch**: Select a feature-specific working branch, depending on what part of the project you are working on. We follow the Git flow branching model:
  - `trunk`: The production release branch
  - `development`: The next release or development branch

Git flow uses several branch prefixes:
- `feature/`
- `bugfix/`
- `release/`
- `hotfix/`
- `support/`

---

## Introduction

The Manufacturing Engineering (ME) department does not currently have an implemented ERP system. The goal of the ena-me-project is to digitalize manual processes and streamline work by developing an SPK (Work Order Management System). This system aims to improve efficiency and ensure accurate management of tasks.

---

## Features

- **Dashboard**: Provides an overview or summary of key metrics and information.
- **SPK (Work Order Management)**: Manages work orders, including creation, assignment, tracking, and updates.
- **Order Management**: Handles customer orders, including order creation, tracking, and fulfillment.
- **Process Management**: Manages the manufacturing processes, including planning, optimization, and monitoring.
- **Machinery Management**: Manages machine operations, including scheduling, tool management, and process control.
- **Warehouse Management (Gudang)**: Manages inventory tracking, stock levels, and order fulfillment.
- **Login Gateway**: Secure authentication, user role management, and access control.

---

## Installation

Follow these steps to install CodeIgniter 4, XAMPP, and Composer:

1. **Install XAMPP** from the [XAMPP website](https://www.apachefriends.org/index.html).
2. **Set up environment**: Add PHP 8 to your PATH by modifying the `~/.bashrc` or `~/.zshrc` file:
   ```bash
   export PATH="/opt/lampp/bin:$PATH"
   ```
   Then apply changes:
   ```bash
   source ~/.bashrc
   ```
3. **Install Composer**:
   ```bash
   ./xampp/php/php composer-setup.php --install-dir=./xampp/php --filename=composer
   ```
4. **Install CodeIgniter 4**:
   ```bash
   ./xampp/php/composer create-project codeigniter4/framework
   ```
5. **Clone the project**:
   ```bash
   cd /opt/lampp/htdocs/
   git clone https://github.com/rafzarf/ena-me-project.git
   ```

---

## Usage

To run the project:

1. Navigate to the `htdocs` directory:
   ```bash
   cd /opt/lampp/htdocs/
   ```
2. Clone the repository:
   ```bash
   git clone https://github.com/rafzarf/ena-me-project.git
   ```
3. Start XAMPP:
   ```bash
   sudo /opt/lampp/lampp start
   ```
4. In the project folder, use CodeIgniter's CLI tool:
   ```bash
   php spark serve
   ```
5. Access the application at `http://localhost:8080`
6. Use phpMyAdmin to manage the database at `http://localhost/phpmyadmin/`

---

## Contributing

We welcome contributions! To contribute:

1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add your commit message'
   ```
4. Push your branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Submit a pull request.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Development Workflow

### Before Starting Work:

1. **Fetch latest changes**:
   ```bash
   git fetch
   git pull origin [working branch]
   ```
   If you want to pull all updates, simply use:
   ```bash
   git pull
   ```

### After Completing Work:

1. **Stage your changes**:
   ```bash
   git add .
   ```
2. **Commit your changes** with a clear message:
   ```bash
   git commit -m "[commit message]"
   ```
   Commit message guidelines:
   - Be specific and concise, e.g., `Added login button to landing page`.
   - Optionally, you can add a description:
   ```bash
   git commit -m "(commit title)" -m "(description)"
   ```
3. **Push changes**:
   ```bash
   git push origin [working branch]
   ```

Repeat the steps as necessary.

---

## Notes for Development

### Week 4 Notes:

1. **ERD Completion**: Ensure that all important fields in the database match the items in the physical forms. This is crucial for generating PDFs that match the physical layout. Aim for completion by the fourth week.
2. **Backend Form**: Try to complete at least one backend form each week, but ERD completion takes priority.
3. **Communication**: Centralize communication through Mas/Pak Yogi to avoid conflicting opinions and streamline decision-making.
4. **Machine Animation**: The machine animation will be replaced by a visual tracking of the SPK process in the workshop. Gather layout info for a top-view of the workshop, showing machine positions.
5. **Logbook Info**: Gather complete logbook information (contact Hapis for week 4 tasks).
6. **Code Efficiency**: If there is repetitive code, consider refactoring it into functions.

### Feature Update (as of 18/04/2024):

- **Dashboard**:
  - Include all machines in the machine operation hours graph with a select option for each machine (e.g., CNC, drill, etc.).
  - Consider displaying other relevant info on the dashboard.
- **SPK, Order, Process, Gudang, Login System**:
  - All completed.
- **Machinery**:
  - The input for machines and machine types is done.
  - The operator feature remains to be implemented.
- **Visualization**:
  - No clear idea yet; gather machine layout information as soon as possible.
