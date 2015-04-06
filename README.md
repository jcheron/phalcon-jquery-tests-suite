# phalcon-jquery-tests-suite
Php unit tests suite for phalcon-jquery library

## Installing via Github

Just clone the repository in your web server root folder :

```
git clone https://github.com/jcheron/phalcon-jquery.git
```

##Running the tests

###phpUnit

Install PHPunit from https://phpunit.de/manual/current/en/installation.html

###ChromeDriver

For running the tests with Chrome, download **Chromedriver** from https://sites.google.com/a/chromium.org/chromedriver/downloads 

###Selenium server

Run the selenium server from the location /server/selenium-server-standalone-x-x-x.jar :
```
java -jar selenium-server-stan
dalone-2.37.0.jar -Dwebdriver.chrome.driver=PATH/TO/CHROMEDRIVER/chromedriv
er.exe
```
