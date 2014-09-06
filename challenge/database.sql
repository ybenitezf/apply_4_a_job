CREATE TABLE IF NOT EXISTS `airframe` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
);

CREATE TABLE IF NOT EXISTS `businesspassenger` (
  `passenger_id` int(11) NOT NULL,
  `flight_miles` int(11) NOT NULL
)

CREATE TABLE IF NOT EXISTS `flight` (
  `number` int(11) NOT NULL,
  `oairport` varchar(3) NOT NULL,
  `departure` datetime NOT NULL,
  `dairport` varchar(3) NOT NULL,
  `arrival` datetime NOT NULL,
  `airframe` int(11) NOT NULL
)

CREATE TABLE IF NOT EXISTS `itinerary` (
  `id` int(11) NOT NULL
)

CREATE TABLE IF NOT EXISTS `passenger` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
)

CREATE TABLE IF NOT EXISTS `res` (
`id` int(11) NOT NULL,
  `flight` int(11) NOT NULL,
  `passenger` int(11) NOT NULL,
  `seat` int(11) NOT NULL
)

CREATE TABLE IF NOT EXISTS `seat` (
  `col` varchar(1) NOT NULL,
  `row` smallint(6) NOT NULL,
  `type` enum('business','economy','','') NOT NULL,
  `airframe` int(11) NOT NULL,
`id` int(11) NOT NULL
)

ALTER TABLE `airframe`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `businesspassenger`
 ADD PRIMARY KEY (`passenger_id`), ADD KEY `passenger_id` (`passenger_id`);
 
ALTER TABLE `flight`
 ADD PRIMARY KEY (`number`), ADD KEY `airframe` (`airframe`);
 
ALTER TABLE `itinerary`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `passenger`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `res`
 ADD PRIMARY KEY (`id`);
 
ALTER TABLE `seat`
 ADD PRIMARY KEY (`id`), ADD KEY `airframe` (`airframe`);
 
ALTER TABLE `airframe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

ALTER TABLE `passenger`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

ALTER TABLE `res`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

ALTER TABLE `seat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

ALTER TABLE `businesspassenger`
ADD CONSTRAINT `businesspassenger_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `flight`
ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`airframe`) REFERENCES `airframe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `seat`
ADD CONSTRAINT `is_in_FK` FOREIGN KEY (`airframe`) REFERENCES `airframe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
