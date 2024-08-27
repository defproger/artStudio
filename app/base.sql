create table gallery
(
    id          int auto_increment
        primary key,
    name        varchar(255) null,
    image       varchar(255) null,
    type        varchar(255) null,
    size        varchar(255) null,
    description text         null,
    status      varchar(100) null,
    price       int          null
);

create table payments
(
    id      int auto_increment
        primary key,
    art_id  int                            not null,
    email   varchar(255)                   not null,
    name    varchar(255)                   not null,
    phone   varchar(30)                    not null,
    address varchar(255)                   not null,
    message text                           null,
    method  varchar(20)                    not null comment 'paypal,credit_card',
    pay_id  varchar(255)                   null,
    status  varchar(255) default 'created' null,
    hash    varchar(255)                   null
);

INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (1, 'The destruction Painting', '1.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'available', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (2, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'in private collection', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (3, 'The destruction Painting', '3.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'sold', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (4, 'The destruction Painting', '4.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'sold in auction', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (5, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'in private collection', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (6, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'available', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (7, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'sold', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (8, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'available', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (9, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'sold in auction', 5000);
INSERT INTO gallery (id, name, image, type, size, description, status, price) VALUES (10, 'The destruction Painting', '2.jpg', 'OIL ON CANVAS', '130 W x 160 H x 1 D cm', 'Sit amet, consectetur adipiscing elit. Praesent at cursus magna, at dapibus eros. Aliquam tincidunt tortor eu placerat vehicula. Curabitur feugiat faucibus mauris id ullamcorper.', 'available', 5000);