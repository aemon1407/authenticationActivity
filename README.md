# authenticationActivity

##register.php
The register.php is for new user to register to the system to allow him make a reservation at the restaurant. The credentials entered by user will be stored in the SQL server. The email and password are also hashed for protection.

##login.php
The login.php is for user to login into the system first before accessing the reservation form. The web server will access sql for stored credential of user data. Session is also implemented in this section.

##index.php
The index.php is implemented with session, where whenever user want to open the reservation form, they will be redirected first to the login page where they need to login first before the system allows them to make reservation.
