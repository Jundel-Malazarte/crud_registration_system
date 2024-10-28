-- registration_db

CREATE TABLE Registration (
    idNum INT(11) PRIMARY KEY,
    campus VARCHAR(100) NOT NULL,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    amountPaid DECIMAL(10, 2),
    attended VARCHAR(3) CHECK (attended IN ('yes', 'no'))
);
