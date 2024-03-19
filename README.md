# Enterprise Automation ME

The ena-me-project is a system for managing SPK (Sistem Pengelolaan SPK) and is the main focus of enterprise automation implementation in the manufacturing engineering department. The goal of this project is to improve the performance, scalability, and maintainability.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The current state of the ME department does not have an implemented ERP system. We aim to digitalize the existing manual processes and improve efficiency by developing the ena-me-project. This project will provide a comprehensive solution for managing SPK and automating various tasks.

## Features

- **Dashboard**: This section is to provide an overview or summary of important information or metrics related to the ena-me-project.

- **SPK**: SPK stands for "Sistem Pengelolaan SPK" which translates to "Work Order Management System" in English. This section is responsible for managing work orders, including creating, assigning, tracking, and updating them.

- **Order**: This section is to handle the management of customer orders. It include features such as order creation, order tracking, and order fulfillment.

- **Proses**: This section is to focus on managing the various processes involved in the manufacturing engineering department. It may include features such as process planning, process optimization, and process monitoring.

- **Permesinan**: This section is to deal with the management of machining operations. It may include features such as machine scheduling, tool management, and machining process control.

- **Gudang**: This section is to handle the management of the warehouse or inventory. It may include features such as inventory tracking, stock management, and order fulfillment from the warehouse.

- **Login Gateway**: This section is responsible for providing a secure login mechanism for users to access the ena-me-project. It may include features such as user authentication, role-based access control, and password management.

## Installation

To get started with the ena-me-project, follow these steps to install CodeIgniter 3, XAMPP, and Composer:

1. Install XAMPP on your system. You can download it from the [XAMPP website](https://www.apachefriends.org/index.html).
2. Open a terminal or command prompt and navigate to the directory where you installed XAMPP.
3. Add the PHP 8 executable to your system's PATH. You can do this by modifying the `~/.bashrc` or `~/.zshrc` file and adding the following line:
    ```
    export PATH="/opt/lampp/bin:$PATH"
    ```
    Save the file and run the following command to apply the changes:
    ```
    source ~/.bashrc
    ```
4. Install Composer by running the following command: `./xampp/php/php composer-setup.php --install-dir=./xampp/php --filename=composer`
5. Install CodeIgniter 3 by running the following command: `./xampp/php/composer create-project codeigniter/framework`
6. You are now ready to run the ena-me-project.


## Usage

To run the ena-me-project, perform the following steps:

1. Go to the htdocs directory:
    ```
    cd /opt/lampp/htdocs/
    ```

2. Git clone the repository to this directory:
    ```
    git clone https://github.com/rafzarf/ena-me-project.git
    ```

3. Start XAMPP:
    ```
    sudo /opt/lampp/lampp start
    ```

4. In the project foler, run the project using CodeIgniter's CLI tool:
    ```
    php spark serve
    ```

5. Access the application in your browser at `http://localhost:8080`
6. Acess the phpMyAdmin in your browser `http://localhost/phpmyadmin/`

## Contributing

Contributions to the ena-me-project are welcome! If you'd like to contribute, please follow these steps:

1. Fork the repository
2. Create a new branch: `git checkout -b feature/your-feature-name`
3. Make your changes and commit them: `git commit -m 'Add your commit message'`
4. Push to the branch: `git push origin feature/your-feature-name`
5. Submit a pull request

## License

This project is licensed under the [MIT License](LICENSE).
