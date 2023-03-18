CREATE TABLE `bus_schedule` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `company_id` int,
  `beginning_location_id` int,
  `destination_location_id` int,
  `bus_departure_time` time,
  `bus_arrival_time` time
);

CREATE TABLE `users_info` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fname` varchar(255),
  `lname` varchar(255),
  `email` varchar(255),
  `address` varchar(255),
  `phone_number` varchar(255),
  `password` varchar(255)
);

CREATE TABLE `bus_companies` (
  `id` int PRIMARY KEY,
  `company_name` varchar(255)
);

CREATE TABLE `ticket_info` (
  `id` int PRIMARY KEY,
  `route_id` int,
  `ticket_price` int,
  `number_of_tickets_available` int
);

CREATE TABLE `ticket_orders` (
  `id` int PRIMARY KEY,
  `ticket_id` int,
  `user_id` int,
  `seat_id` int,
  `purchased_at` time
);

CREATE TABLE `locations_of_stop` (
  `id` int PRIMARY KEY,
  `location` varchar(255)
);

CREATE TABLE `mileage_of_trip` (
  `id` int PRIMARY KEY,
  `beginning_location_id` int,
  `destination_location_id` int,
  `total_miles` int
);

CREATE TABLE `bus_schedule_bus_companies` (
  `bus_schedule_company_id` int,
  `bus_companies_id` int,
  PRIMARY KEY (`bus_schedule_company_id`, `bus_companies_id`)
);

ALTER TABLE `bus_schedule_bus_companies` ADD FOREIGN KEY (`bus_schedule_company_id`) REFERENCES `bus_schedule` (`company_id`);

ALTER TABLE `bus_schedule_bus_companies` ADD FOREIGN KEY (`bus_companies_id`) REFERENCES `bus_companies` (`id`);


ALTER TABLE `locations_of_stop` ADD FOREIGN KEY (`id`) REFERENCES `bus_schedule` (`destination_location_id`);

ALTER TABLE `ticket_info` ADD FOREIGN KEY (`route_id`) REFERENCES `bus_schedule` (`id`);

ALTER TABLE `locations_of_stop` ADD FOREIGN KEY (`id`) REFERENCES `bus_schedule` (`beginning_location_id`);

ALTER TABLE `ticket_orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users_info` (`id`);

ALTER TABLE `mileage_of_trip` ADD FOREIGN KEY (`destination_location_id`) REFERENCES `locations_of_stop` (`id`);

ALTER TABLE `mileage_of_trip` ADD FOREIGN KEY (`beginning_location_id`) REFERENCES `locations_of_stop` (`id`);

ALTER TABLE `ticket_info` ADD FOREIGN KEY (`ticket_price`) REFERENCES `mileage_of_trip` (`id`);

ALTER TABLE `ticket_orders` ADD FOREIGN KEY (`ticket_id`) REFERENCES `ticket_info` (`id`);
