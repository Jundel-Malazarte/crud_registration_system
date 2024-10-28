CREATE TABLE Registration (
    idNum TEXT PRIMARY KEY,
    campus TEXT NOT NULL,
    fname TEXT NOT NULL,
    lname TEXT NOT NULL,
    amountPaid NUMERIC,
    attended TEXT CHECK (attended IN ('yes', 'no'))
);
