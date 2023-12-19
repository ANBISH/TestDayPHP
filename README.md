# TestDayPHP
Необхідно створити сервіс обліку документів.

sql - скрипт

-- Створення таблиць
CREATE TABLE Client (
    client_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    tax_id VARCHAR(20) NOT NULL,
    contact_number VARCHAR(15) NOT NULL
);

CREATE TABLE Contract (
    contract_id INT PRIMARY KEY AUTO_INCREMENT,
    client_id INT,
    signing_date DATE NOT NULL,
    expiry_date DATE NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Client(client_id)
);

CREATE TABLE Employee (
    employee_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    salary DECIMAL(10, 2) NOT NULL,
    photo BLOB,
    contract_id INT,
    FOREIGN KEY (contract_id) REFERENCES Contract(contract_id)
);


-- Додавання тестових даних
INSERT INTO Client (name, tax_id, contact_number) VALUES
    ('Client1', '123456789', '+12345678901'),
    ('Client2', '987654321', '+98765432109');

INSERT INTO Contract (client_id, signing_date, expiry_date, amount) VALUES
    (1, '2023-01-01', '2024-01-01', 5000.00),
    (2, '2023-02-01', '2024-02-01', 8000.00);

INSERT INTO Employee (full_name, birth_date, salary, photo) VALUES
    ('John Doe', '1990-01-15', 60000.00, NULL),
    ('Jane Smith', '1985-05-20', 75000.00, NULL);


