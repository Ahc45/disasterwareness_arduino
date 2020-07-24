

#include <SPI.h>
#include <Ethernet.h>


byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

char server[] = "192.168.254.100";  // numeric IP for Google (no DNS)
//char server[] = "www.google.com";    // name address for Google (using DNS)

// Set the static IP address to use if the DHCP fails to assign
IPAddress ip(192, 168, 254, 105);

// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;

const int pingPin = 22; // Trigger Pin of Ultrasonic Sensor
const int echoPin = 23; // Echo Pin of Ultrasonic Sensor

String rcv = "";
int data = 0;

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }

  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  // give the Ethernet shield a second to initialize:
  delay(1000);

}

void loop() {

  int inches = usensor();
 
  data = inches;
  Serial.println(data);
  //httpRequest();
  sendata(data);
  delay(100);
}

void sendata(int data){
    Serial.println("connecting...");

  // if you get a connection, report back via serial:
  if (client.connect(server, 81)) {
    
    Serial.println("connected");
    client.println("GET /disasterwareness/public_view/insert_data?data=" + String(data) + " HTTP/1.1");
    client.println("Host: 192.168.254.100:81");
    client.println("Connection: close");
    client.println();
            unsigned long timeout = millis();
             while (client.available() == 0) 
            {
                if (millis() - timeout > 25000) //If nothing is available on server for 25 seconds, close the connection.
               { 
                 return;
               }
            }
            while(client.available())
            {
          String line = client.readStringUntil('\r'); //Read the server response line by line..
          char c = client.read();
          rcv = line;
           }
          Serial.println(rcv);
            client.stop(); // Close the connection.
            
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  }

void httpRequest(){
 
   if (client.connect(server, 81)) 
    {
      //Serial.println("Connection established 1");
      client.print(String("GET ") + "/ info.php?data="+ data + " HTTP/1.1\r\n" + "Host: " + server + ":81 "+"\r\n" + "Connection: close\r\n\r\n"); //GET request for server response. 
      unsigned long timeout = millis();
             while (client.available() == 0) 
            {
                if (millis() - timeout > 25000) //If nothing is available on server for 25 seconds, close the connection.
               { 
                 return;
               }
            }
            while(client.available())
            {
          String line = client.readStringUntil('\r'); //Read the server response line by line..
          char c = client.read();
          rcv = line;
           }
          Serial.println(rcv);
            client.stop(); // Close the connection.
            
     }
     else
    {
       Serial.println("Connection failed 1");
      
    }
}
long microsecondsToInches(long microseconds) {
   return microseconds / 74 / 2;
}

long microsecondsToCentimeters(long microseconds) {
   return microseconds / 29 / 2;
}

int usensor(){
   long duration, inches, cm;
   pinMode(pingPin, OUTPUT);
   digitalWrite(pingPin, LOW);
   delayMicroseconds(2);
   digitalWrite(pingPin, HIGH);
   delayMicroseconds(10);
   digitalWrite(pingPin, LOW);
   pinMode(echoPin, INPUT);
   duration = pulseIn(echoPin, HIGH);
   inches = microsecondsToInches(duration);
   cm = microsecondsToCentimeters(duration);
   return inches;
  }

