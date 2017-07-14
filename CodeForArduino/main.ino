#include <SPI.h> 
#include <Ethernet.h> 
#define pin1 2

byte mac[] = {0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02};
//IPAddress ip(192,168,0,16); 
char server[] = "192.168.0.2"; 
EthernetClient client;


void setup() {
  Serial.begin(9600);     
    while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
 // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // no point in carrying on, so do nothing forevermore:
    for (;;)
      ;
  }
  //Ethernet.begin(mac, ip);
  pinMode(pin1,INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(pin1),blink,RISING);
   printIPAddress();
  Serial.println("The Hunt Begins");
}
void printIPAddress()
{
  Serial.print("My IP address: ");
  for (byte thisByte = 0; thisByte < 4; thisByte++) {
    // print the value of each byte of the IP address:
    Serial.print(Ethernet.localIP()[thisByte], DEC);
    Serial.print(".");
  }

  Serial.println();
}
void loop() {
}
void blink(){
 Serial.println("on");
 if (client.connect(server, 80)) 
 {     
    client.print("GET /SmartMeteringSystem/add.php?");
    client.print("led=on"); 
    // And this is what we did in the testing section above. We are making a GET request just like we would from our browser but now with live data from the sensor     
    client.println(" HTTP/1.1"); 
    // Part of the GET request     
    client.println("Host: 192.168.0.2"); 
    // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie.Host: "www.yourwebpage.com")     
    client.println("Connection: close");   // Part of the GET request telling the server that we are over transmitting the message     
    client.println();   // Empty line     
    client.println();   // Empty line     
    client.stop();   // Closing connection to server   
  }   
  else 
  {
    // If Arduino can't connect to the server (your computer or web page)     
    Serial.println("--> connection failed\n");   
  }     
}
