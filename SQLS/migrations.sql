INSERT INTO users_info(id, fname, lname, email, addres, phone_number, passwrd)
VALUES
(1, 'James', 'Camron', 'jcamron@gmail.com', '15 J Street', '6001234', 'monkey123'),
(2, 'Mary', 'Elizabeth', 'mbeth@gmail.com', '25 Mason Avenue', '6123400', 'jesussaves1'),
(3, 'Chris', 'Cuellar', 'ccuellar@hotmail.com', '35 New Town', '6508000', 'new1old1'),
(4, 'Bob', 'Johnson', 'bjohnson@yahoo.com', '45 Central American', '6010203', 'moonman7'),
(5, 'Jerry', 'Mars', 'jmars@gmail.com', '55 Bruno Street', '6008000', 'grenade2007'),
(6, 'Patrick', 'Barrow', 'pbarrow@yahoo.com', '65 UDP Street', '6085050', '2024PUP'),
(7, 'Xander', 'Faber', 'xfaber@hotmail.com', '75 Orange Street', '6098976', '8bones3'),
(8, 'Simon', 'Newman', 'snewman@hotmail.com', '36 New Tone', '6438291', '8one8one'),
(9, 'Marta', 'Kent', 'mkent@gmail.com', '56 Bruno Street', '6373731', 'brunomars7'),
(10, 'Daniella', 'Martin', 'dmartin@gmail.com', '57 UDP Street', '6019876', '1bad2bunny');

INSERT INTO bus_companies(id, company_name)
VALUES
(01, 'James'),
(02, 'McFadzean'),
(03, 'Westline'),
(04, 'Floralia'),
(05, 'Morales'),
(06, 'Shaws'),
(07, 'Russel'),
(08, 'Brads'),
(09, 'Speed Busline');

INSERT INTO locations_of_stop(id, stops)
VALUES
(001, 'Belize'),
(002, 'Belmopan'),
(003, 'Cayo'),
(004, 'Punta Gorda'),
(005, 'Dangriga'),
(006, 'Stann Creek'),
(007, 'Corozal'),
(008, 'Orange Walk');

INSERT INTO bus_schedule(id, company_id, beginning_location_id, destination_location_id, bus_departure_time, bus_arrival_time)
VALUES
(1, 08, 001, 002, '08:00:00', '08:55:00'),
(2, 07, 002, 003, '09:00:00', '10:00:00'),
(3, 06, 003, 004, '10:00:00', '11:30:00'),
(4, 05, 004, 005, '05:00:00', '06:00:00'),
(5, 04, 005, 006, '03:00:00', '04:10:00'),
(6, 03, 006, 007, '01:00:00', '02:15:00'),
(7, 02, 008, 001, '02:00:00', '04:00:00'),
(8, 01, 001, 002, '03:30:00', '05:00:00');

INSERT INTO mileage_of_trip(id, beginning_location_id, destination_location_id, total_miles)
VALUES
(1, 001, 002, 23),
(2, 001, 002, 27),
(3, 001, 002, 39),
(4, 001, 002, 24),
(5, 001, 002, 51),
(6, 001, 002, 24),
(7, 001, 002, 51),
(8, 001, 002, 39),
(9, 001, 002, 32);

INSERT INTO ticket_info(id, route_id, ticket_price, number_of_tickets_available)
VALUES
(1, 0001, 7, 32),
(2, 0002, 9, 32),
(3, 0003, 7, 30),
(4, 0004, 7, 32),
(5, 0005, 10, 32),
(6, 0006, 12, 28),
(7, 0007, 5, 30),
(8, 0008, 9, 28);

INSERT INTO ticket_orders(id, ticket_id, user_id, seat_id)
VALUES
(1, 1, 1, 23),
(2, 2, 2, 17),
(3, 3, 5, 03),
(4, 4, 10, 09),
(5, 5, 2, 29),
(6, 6, 3, 11),
(7, 8, 5, 01),
(8, 7, 6, 02);
