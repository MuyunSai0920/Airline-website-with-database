A simple Airline Management System built with PHP + MySQL, allowing users to manage airlines, airplanes, airports, and flights. This project demonstrates fundamental CRUD operations, relational database design, and PHP backend programming.


📁 Project Structure
├── airlineDB.sql       # MySQL database schema and sample data
├── airline.php          # Display and manage airline information
├── Flight.php            # Flight entity class (PHP)
├── add.php               # Add new records (flights, airplanes, etc.)
├── modify.php            # Modify existing records
├── filter.php             # Filter/search flights
├── seats.php               # View available seats for a flight
├── daos.php                # Data access layer (DAO)


🗄️ Database Design
The system uses a relational database named airlineDB.
Main tables include:
| Table          | Description                                       |
| -------------- | ------------------------------------------------- |
| `Airline`      | Stores airline codes and names                    |
| `Airplane`     | Stores airplane info and links to airlines/types  |
| `Airport`      | Stores airport codes, names, and locations        |
| `Type`         | Stores airplane type, seat count, manufacturer    |
| `Flight`       | Stores flight details (time, plane, route, seats) |
| `DayForFlight` | Maps flights to scheduled dates                   |
| `handelling`   | Which airports can handle which plane types       |


⚙️ Setup Instructions
1. Create Database

Open phpMyAdmin or MySQL CLI.
Run the script: SOURCE airlineDB.sql;
This will create all tables and insert sample data.

2. Configure PHP Environment
Place all .php files in your web server root (e.g. htdocs for XAMPP, www for WAMP).
Make sure mysqli or PDO extension is enabled.

3. Update DB Credentials
In daos.php, configure your database host, username, password, and database name as needed.


🖥️ Usage
airline.php — View or manage airline information.
add.php — Add new flight, airplane, or airport records.
modify.php — Edit existing records.
filter.php — Search for flights using filters.
seats.php — Check the available seats of a given flight.


💡 Features
CRUD operations on Airlines, Flights, Airplanes, Airports
Relational database schema with foreign key constraints
Simple and clean PHP backend structure (DAO pattern)
Example data to test and demo immediately
