## Installation
Clone this project to your computer.
This project was made using Python as the main language. Make sure you have Python installed in your system. You will also need to install the following packages:
```bash
sudo apt-get install python3-rpi.gpio python3-smbus
pip3 install adafruit-circuitpython-board adafruit-circuitpython-busdevice adafruit-circuitpython-ads1x15
```
If you wish to use Blynk and ThinkSpeak then install the additional packages below:
```
pip3 install blynklib requests
```
Make sure you have installed MySQL on your system and edit the code to adjust using your credentials.
```bash
pip3 install mysqlclient
```
## Usage
Execute the corresponding script based on the sensor name. All scripts use MySQL to store the log data. The combined script is named combination which also works with Blynk, ThingSpeak, and additional cloud/hosted website services. You can modify based on what you need.
## Credit
It's free to use any of these codes, especially for school and hobbies. I hope this can help you
