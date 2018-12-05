# MoonClock
Tablet Powered Magic Mirror Clock showing the Moon / Earth and current outside conditions.

![](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/20181129_195812.jpg)

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

	// weather API*
	$weatherAPIURL = 'http://api.forecast.io/';
	$weatherAPIKey = 'MY API KEY HERE';
	$latitude = '42.512000';
	$longitude = '-71.151510';

**Special Feature**

If you wish to have your temperatures color coded, more red for hot outside, more blue for cold outside, you can create and point this application at the following GitHub URL: https://github.com/khinds10/TemperatureAPI and assign the newly created URL to the following PHP value

	// temperature color API
	$temperatureColorAPI = 'http://my-temperature.api.net';

### **Supplies Needed**

Old Tablet

![Tablet](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/tablet.jpg)

Picture frame large enough to surround the tablet completely inside

![Picture Frame](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/picture-frame.png)

2 Way Mirror size cut to fit the frame

![2 Way Mirror](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/2-way-mirror.png)

Thin piece of wood, cut to the same HxW of the picture frame itself. This will be attached to the back of the entire picture frame, holding the tablet inside like it's inside of a thin box.

![Thin Wood](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/wood.png)


### **Constructing the Project**

For good measure, paint the back panel (thin piece of wood) of the picture frame black to prevent it showing through the 2 way mirror.

![](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/20181129_163903.jpg)

Place the 2 way mirror in front of the tablet, I've placed a paint stick (also painted black on the front) to hold up the tablet screen higher in the frame to appear more centered.

![](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/20181129_164006.jpg)

![](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/20181129_175934.jpg)

### FINISHED

On the tablet itself install a "kiosk style" browser application, one that's meant to keep the same page displayed for long periods of time.  It should also keep the screen on, so it doesn't turn off due to inactivity when it's inside the frame.

Point the kiosk browser app to your created new website above.

Screw the back panel (thin piece of wood) on the painting, Hang on the wall with USB power nearby:

![](https://raw.githubusercontent.com/khinds10/MoonClock/master/construction/20181129_195801.jpg)

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
