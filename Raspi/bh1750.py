import smbus
import time
import MySQLdb
db = MySQLdb.connect(host="localhost", user="kel2te4b",
                     passwd="12345678", database="sensor")
cur = db.cursor()

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

bus = smbus.SMBus(1)


def getLight(addr=LIGHT):
    data = bus.read_i2c_block_data(addr, ONE_TIME_HIGH_RES_MODE_1)
    result = (data[1] + (256 * data[0])) / 1.2
    return result


def main():
    light = round(getLight(), 2)
    print(f"Cahaya: {light:.2f} lux")
    sql = ("""INSERT INTO sensorCahaya (cahaya) VALUES (%s)""", (light,))
    cur.execute(*sql)
    db.commit()
    time.sleep(3)


try:
    while True:
        main()
except KeyboardInterrupt:
    print("Measurement stopped by User")
