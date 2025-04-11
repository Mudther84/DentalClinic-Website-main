CREATE DATABASE dental_clinic;
USE dental_clinic;
CREATE TABLE appointments
(
    id INT
    AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
    (100) NOT NULL,
    email VARCHAR
    (100) NOT NULL,
    phone VARCHAR
    (20) NOT NULL,
    appointment_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
    CREATE TABLE contact_messages
    (
        id INT
        AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
        (100) NOT NULL,
    email VARCHAR
        (100) NOT NULL,
    phone VARCHAR
        (20),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
        CREATE TABLE users
        (
            id INT
            AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
            (100) NOT NULL,
    email VARCHAR
            (100) UNIQUE NOT NULL,
    phone VARCHAR
            (20) NOT NULL,
    password VARCHAR
            (255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

