import board
import time
import busio
import adafruit_ads1x15.ads1115 as ADS
from adafruit_ads1x15.analog_in import AnalogIn
import MySQLdb
db = MySQLdb.connect(host="localhost", user="kel2te4b",
                     passwd="12345678", database="sensor")
cur = db.cursor()

i2c = busio.I2C(board.SCL, board.SDA)
ads = ADS.ADS1115(i2c)
a0 = AnalogIn(ads, ADS.P0)


def main():
    temp = round((5.0 * (1-a0.voltage) * 10000.0)/1024, 2)-1
    print(f"Suhu: {temp:.2f} °C")
    sql = ("""INSERT INTO sensorSuhu (suhu) VALUES (%s)""", (temp,))
    cur.execute(*sql)
    db.commit()
    time.sleep(3)


try:
    while True:
        main()
except KeyboardInterrupt:
    print("Measurement stopped by User")
