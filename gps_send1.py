import serial
import pynmea2
import firebase_admin
from firebase_admin import credentials, db

cred = credentials.Certificate({
  "type": "",
  "project_id": "",
  "private_key_id": "",
  "private_key": "",
  "client_email": "",
  "client_id": "",
  "auth_uri": "",
  "token_uri": "",
  "auth_provider_x509_cert_url": "",
  "client_x509_cert_url": "",
  "universe_domain": ""
} )

firebase_admin.initialize_app(cred, {'databaseURL': ''})

def send_data_to_firebase(latitude, longitude):
    # Update data in Firebase
    ref = db.reference('/')
    ref.update({"LAT": latitude, "LNG": longitude})
    print("Data sent to Firebase")

def main():
    port = "/dev/ttyAMA0"

def main():
    port = "/dev/ttyAMA0"
    ser = serial.Serial(port, baudrate=9600, timeout=0.5)

    while True:
        newdata = ser.readline()
        n_data = newdata.decode('latin-1')

        if n_data.startswith('$GNGGA'):
            newmsg = pynmea2.parse(n_data)
            lat = newmsg.latitude
            lng = newmsg.longitude
            gps = f"Latitude={lat} and Longitude={lng}"
            print(gps)

            send_data_to_firebase(lat, lng)

if __name__ == "__main__":
    main()
