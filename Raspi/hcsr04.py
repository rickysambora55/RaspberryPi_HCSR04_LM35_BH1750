import RPi.GPIO as GPIO
import time
import MySQLdb
db = MySQLdb.connect(host="localhost", user="kel2te4b",
                     passwd="12345678", database="sensor")
cur = db.cursor()
GPIO.setmode(GPIO.BCM)

GPIO_TRIGGER = 18
GPIO_ECHO = 24

GPIO.setup(GPIO_TRIGGER, GPIO.OUT)
GPIO.setup(GPIO_ECHO, GPIO.IN)


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


def main():
    dist = round(getDistance(), 2)
    print(f"Jarak: {dist:.2f} cm")
    sql = ("""INSERT INTO sensorJarak (jarak) VALUES (%s)""", (dist,))
    cur.execute(*sql)
    db.commit()
    time.sleep(3)


try:
    while True:
        main()
except KeyboardInterrupt:
    print("Measurement stopped by User")
    GPIO.cleanup()
