DROP TABLE IF EXISTS expenses;


CREATE TABLE expenses (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  expense_name VARCHAR(255) NOT NULL,
  cost VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL
);