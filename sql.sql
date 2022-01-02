CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    email varchar(30),
    price_top int(20),
    price_purchase int(20),
    price_bot int(20),
    create_token_date date,
    PRIMARY KEY (id)
) AUTO_INCREMENT=1;