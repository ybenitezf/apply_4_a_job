Airline reservations problem domain has the following considerations:

An airframe is a particular aircraft design.  Specifically, an airframe implies a certain number of seats, a certain number of rows seats and a certain number of 'columns' of seats. 

A flight is a scheduled takeoff and landing of a particular airframe, where said airframe departs a particular airport at a particular time and lands at another particular airport at another particular time.

A passenger is an individual.  A passenger may be an economy class passenger or a business class passenger.  
 
A flight reservation is the assignment of a particular passenger to a particular seat on a particular flight.

An itinerary is one or more flight reservations for a particular passenger.  If the passenger has connecting flights then the passenger itinerary shall show multiple flight reservations.  

Design a PHP program that supports the following requirements:

Create a seat class. The seat class contains
1. seat column (letters)
2. seat row (numbers)
3. Seat type (enum business/economy) 

The seat class's row and column scheme stores the seat's number (e.g., "23B").

Create an airframe class.  The airframe class contains
1. Airframe name (e.g., "737", Airbus)
2. A collection of seats 

Create a flight class.  A flight class is comprised of:
1. Flight number (int)
2. pointer to an Airframe
3. Originating airport (three letter code) 
4. Departure time/date (time_t) (assume GMT)
5. Destination airport (three letter code)
6. Arrival time/date (time_t) (assume GMT)

Create a passenger class.  The passenger class contains the following attribute:
1. name (string)

Create a businessPassenger class.  The businessPassenger class is derived from the passenger class.  The additional attribute of a business passenger is that a business passenger has "business class" flight miles.
1. Business class flight miles (int) 

Create a flight reservation class.  A flight reservation class contains:
1. A pointer to a flight 
2. A pointer to a passenger (either a businessPassenger or a regular passenger)
3. A pointer to a seat 

Create an itinerary class. An itinerary contains:
1. A collection of flight reservations


Scenario

Business passenger Jill and passenger Joe are flying from Houston to Boston. They are changing planes in Atlanta.  The share the same plane on both flights.  

They are flying an Airbus from Houston to Atlanta.  Departure time is 9:00:00 on April 1st, 2012.  Arrival time is 11:00:00 April 1st, 2012. The flight number is 7. The Airbus is provisioned with seat in columns A-G and rows 1-70.  Seats in rows from 1-30 are business class.

They are flying a 737 from Atlanta to Boston.  Departure time is 14:00:00 on April 1st, 2012.  Arrival time is 17:00:00 April 1st, 2012. The flight number is 9. The 737 is provisioned with seat in columns A-E and rows 1-50. Seats in rows from 1-15 are business class.

Airport codes:
1. Houston: IAH
2. Atlanta's airport code: ATL
3. Boston's airport code: BOS

Joe's itinerary places him on:
1. flight 7, seat 40C, and
2. flight 9, seat 30D

Jill's itinerary places her on:
1. flight 7, seat 4A, and
2. flight 9, seat 3B

Test instructions: 

Based on the above descriptions, write a program that allow creates (manually) itineraries for Jill and Joe and save them to a MySQL Database.  

Create a functionality that Iterate each itinerary and create a printable report of the itineraries for both Jill and Joe. 

Program must be written using Codeigniter framework

Program must use ajax form submissions

Program must be done using resposive design

Challenge must be completed within 3 days from the original pull.
