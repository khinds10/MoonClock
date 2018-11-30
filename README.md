# MoonClock
Tablet Powered Magic Mirror Clock showing the Moon / Earth and current outside conditions.

## Installation

**Clone the project on a LAMP enabled webserver, (PHP/Apache).**

$ cd /var/www

$ git clone https://github.com/khinds10/MoonClock.git

**Apache2 Configuration File**

<VirtualHost *:80>
	ServerName moon.myserver.com
	ServerAlias moon.myserver.com
	ServerAdmin admin@moon.myserver.com
	DocumentRoot /var/www/MoonClock
	<Directory /var/www/MoonClock>
		Options FollowSymLinks
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>

**Configure Application Settings**

In the settings/ folder of the project copy the *settings.shadow.php* to *settings.php*, adjust the php values accordingly to match your local configuration.

*// weather API*
*$weatherAPIURL = 'http://api.forecast.io/';*
*$weatherAPIKey = 'MY API KEY HERE';*
*$latitude = '42.512000';*
*$longitude = '-71.151510';*

**Special Feature**

If you wish to have your temperatures color coded, more red for hot outside, more blue for cold outside, you can create and point this application at the following GitHub URL: https://github.com/khinds10/TemperatureAPI and assign the newly created URL to the following PHP value

*// temperature color API*
*$temperatureColorAPI = 'http://my-temperature.api.net';*

### **Constructing the Project**

images here







## A PHP class for calculating the phase of the Moon  

#### [by Samir Shah - solarissmoke]

MoonPhase is a PHP class for calculating the phase of the Moon, and other related variables. It is based on [Moontool for Windows](http://www.fourmilab.ch/moontoolw/).

### Usage

Create an instance of the `Solaris\MoonPhase` class, supplying a UNIX timestamp for when you want to determine the moon phase (if you don't then the current time will be used). You can then use the following class functions to access the properties of the object:

 - `phase()`: the terminator phase angle as a fraction of a full circle (i.e., 0 to 1). Both 0 and 1 correspond to a New Moon, and 0.5 corresponds to a Full Moon.
 - `illumination()`: the illuminated fraction of the Moon (0 = New, 1 = Full).
 - `age()`: the age of the Moon, in days.
 - `distance()`: the distance of the Moon from the centre of the Earth (kilometres).
 - `diameter()`: the angular diameter subtended by the Moon as seen by an observer at the centre of the Earth (degrees).
 - `sundistance()`: the distance to the Sun (kilometres).
 - `sundiameter()`: the angular diameter subtended by the Sun as seen by an observer at the centre of the Earth (degrees).
 - `new_moon()`: the time of the last New Moon (UNIX timestamp).
 - `next_new_moon()`: the time of the next New Moon (UNIX timestamp).
 - `full_moon()`: the time of the Full Moon in the current lunar cycle (UNIX timestamp).
 - `next_full_moon()`: the time of the next Full Moon in the current lunar cycle (UNIX timestamp).
 - `first_quarter()`: the time of the first quarter in the current lunar cycle (UNIX timestamp).
 - `next_first_quarter()`: the time of the next first quarter in the current lunar cycle (UNIX timestamp).
 - `last_quarter()`: the time of the last quarter in the current lunar cycle (UNIX timestamp).
 - `next_last_quarter()`: the time of the next last quarter in the current lunar cycle (UNIX timestamp).
 - `phase_name()`: the [phase name](http://aa.usno.navy.mil/faq/docs/moon_phases.php).

#### Example

	// create an instance of the class, and use the current time
	$moon = new Solaris\MoonPhase();
	$age = round( $moon->age(), 1 );
	$stage = $moon->phase() < 0.5 ? 'waxing' : 'waning';
	$distance = round( $moon->distance(), 2 );
	$next = gmdate( 'G:i:s, j M Y', $moon->next_new_moon() );
	echo "The moon is currently $age days old, and is therefore $stage. ";
	echo "It is $distance km from the centre of the Earth. ";
	echo "The next new moon is at $next.";
