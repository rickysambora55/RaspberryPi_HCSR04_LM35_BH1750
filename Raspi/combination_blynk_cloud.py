import RPi.GPIO as GPIO
import board
import smbus
import time
import busio
import adafruit_ads1x15.ads1115 as ADS
import BlynkLib
import MySQLdb
from adafruit_ads1x15.analog_in import AnalogIn
db = MySQLdb.connect(host="localhost", user="kel2te4b",
                     passwd="12345678", database="sensor")
cur = db.cursor()
dbCloud = MySQLdb.connect(host="1.2.3.4", user="user",
                          passwd="pass", database="db")
curCloud = dbCloud.cursor()
blynk = BlynkLib.Blynk(
    'token', server="blynk.cloud")

LIGHT = 0x23
POWER_DOWN = 0x00
POWER_ON = 0x01
RESET = 0x07
CONTINUOUS_LOW_RES_MODE = 0x13
CONTINUOUS_HIGH_RES_MODE_1 = 0x10
CONTINUOUS_HIGH_RES_MODE_2 = 0x11
ONE_TIME_HIGH_RES_MODE_1 = 0x20
ONE_TIME_HIGH_RES_MODE_2 = 0x21
ONE_TIME_LOW_RES_MODE = 0x23

GPIO.setmode(GPIO.BCM)
GPIO_TRIGGER = 18
GPIO_ECHO = 24
GPIO.setup(GPIO_TRIGGER, GPIO.OUT)
GPIO.setup(GPIO_ECHO, GPIO.IN)

bus = smbus.SMBus(1)
i2c = busio.I2C(board.SCL, board.SDA)
ads = ADS.ADS1115(i2c)
a0 = AnalogIn(ads, ADS.P0)

blynk_suhu = 0
blynk_jarak = 1
blynk_cahaya = 2


def getLight(addr=LIGHT):
    data = bus.read_i2c_block_data(addr, ONE_TIME_HIGH_RES_MODE_1)
    result = (data[1] + (256 * data[0])) / 1.2
    return result


def getDistance():
    GPIO.output(GPIO_TRIGGER, True)

    # set Trigger after 0.01ms to LOW
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER, False)

    StartTime = time.time()
    StopTime = time.time()

    while GPIO.input(GPIO_ECHO) == 0:
        StartTime = time.time()
    while GPIO.input(GPIO_ECHO) == 1:
        StopTime = time.time()

    # time difference between start and arrival
    TimeElapsed = StopTime - StartTime
    # multiply with the sonic speed (34300 cm/s)
    # and divide by 2, because there and back
    distance = (TimeElapsed * 34300) / 2

    return distance


def dbLocalPush(light, dist, temp):
    cur.execute("INSERT INTO sensorCahaya (cahaya) VALUES (%s)", (light,))
    cur.execute("INSERT INTO sensorJarak (jarak) VALUES (%s)", (dist,))
    cur.execute("INSERT INTO sensorSuhu (suhu) VALUES (%s)", (temp,))
    db.commit()


def dbCloudPush(light, dist, temp):
    curCloud.execute("INSERT INTO sensorCahaya (cahaya) VALUES (%s)", (light,))
    curCloud.execute("INSERT INTO sensorJarak (jarak) VALUES (%s)", (dist,))
    curCloud.execute("INSERT INTO sensorSuhu (suhu) VALUES (%s)", (temp,))
    dbCloud.commit()


def blynkPush(light, dist, temp):
    blynk.virtual_write(blynk_cahaya, light)
    blynk.virtual_write(blynk_jarak, dist)
    blynk.virtual_write(blynk_suhu, temp)


def main():
    light = round(getLight(), 2)
    dist = round(getDistance(), 2)
    temp = round((5.0 * (1-a0.voltage) * 10000.0)/1024, 2)-1
    print(
        f"Suhu: {temp:.2f} °C | Jarak: {dist:.2f} cm | Cahaya: {light:.2f} lux")
    dbLocalPush(light, dist, temp)
    dbCloudPush(light, dist, temp)
    blynkPush(light, dist, temp)
    time.sleep(3)

# @blynk.on("connected")
# def blynk_connected():
#     print("====================================")
#     print("          Blynk Connected           ")
#     print("====================================")
#     time.sleep(2);
#
# @blynk.on("diconnected")
# def blynk_connected():
#     print("====================================")
#     print("         Blynk Disconnected         ")
#     print("====================================")
#     time.sleep(2);


try:
    while True:
        blynk.run()
        main()
except KeyboardInterrupt:
    print("Measurement stopped by User")
    GPIO.cleanup()
