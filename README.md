# ✈️ Airline Management System

> A simple Airline Management System built with PHP & MySQL, providing CRUD operations for airlines, airplanes, airports, and flights.

---

## 🧩 Features

- ✈️ **Airline Management**  
  Add, modify, and view airline information.

- 🛫 **Flight Management**  
  Create, update, filter, and search flights. View available seats.

- 🛩️ **Airplane & Type Management**  
  Manage airplanes, their types, associated airlines, and seating capacity.

- 🏙️ **Airport Management**  
  Maintain airport names, locations, and supported airplane types.

- 📅 **Flight Scheduling**  
  Store and manage flight dates using the `DayForFlight` table.

- 💾 **DAO (Data Access Object) Architecture**  
  `daos.php` provides a unified interface for database operations.

---

## 🗄️ Database Schema

**Database name:** `airlineDB`

**Main tables:**

| Table            | Description                                    |
|------------------|------------------------------------------------|
| `Airline`         | Airline code and name                           |
| `Airplane`        | Airplane ID, year, airline, and type             |
| `Airport`         | Airport code, name, and location                  |
| `Type`             | Airplane type, seat count, manufacturer             |
| `Flight`             | Flight number, departure/arrival, plane, seats       |
| `DayForFlight`         | Mapping of flights to scheduled dates                      |
| `handelling`                 | Which airports can handle which airplane types                   |

**Key foreign relationships:**
- `Flight.AirlineCode` → `Airline.AirlineCode`
- `Flight.AirplaneID` → `Airplane.AirplaneID`
- `Flight.DepartAirportCode` → `Airport.AirportCode`
- `Airplane.TypeName` → `Type.TypeName`
- `handelling.TypeName` → `Type.TypeName`
- `handelling.AirportCode` → `Airport.AirportCode`

---

## ⚙️ Setup & Installation

### 📌 Step 1 — Import the Database
1. Open phpMyAdmin or MySQL CLI.
2. Run:
   ```sql
   SOURCE airlineDB.sql;
3. This will create all tables and insert sample data.

### 📌 Step 2 — Deploy PHP Files
 1. Copy all `.php` files into your local server directory
    For example:
      - XAMPP: htdocs/airline/
      - WAMP:  www/airline/
 2. Make sure the `mysqli` or `PDO` extension is enabled in your PHP environment
### 📌 Step 3 — Configure Database Connection
1. Open daos.php
2. Fill in your DB connection details:
$host = "localhost";
$user = "root";
$pass = "your_password";
$dbname = "airlineDB";

## 🖥️ Usage Guide
| File          | Description                             |
| ------------- | --------------------------------------- |
| `airline.php` | View and manage airline information     |
| `Flight.php`  | Flight class and entity interactions    |
| `add.php`     | Add new flights, airplanes, or airports |
| `modify.php`  | Modify existing records                 |
| `filter.php`  | Search and filter flights               |
| `seats.php`   | View available seats for a given flight |
| `daos.php`    | Data access layer (database operations) |

## 📁 Project Structure
- `airlineDB.sql` → `# Database schema and sample data`
- `airline.php` → `# Airline management page`
- `Flight.php` → `# Flight class`
- `add.php` → `# Add new records`
- `modify.php` → `# Modify records`
- `filter.php ` → `# Search/filter flights`
- `seats.php ` → `# Check available seats`
- `daos.php` → `# Database access layer`


