//include libraries
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

//I2C pins declaration
LiquidCrystal_I2C lcd(0x27, 2, 1, 0, 4, 5, 6, 7, 3, POSITIVE);

//Access point credentials
const char* ssid = "miy";
const char* pwd = "miy1234567";
const char* host = "http://192.168.43.63";
String get_host = "http://192.168.43.63";

//SETPIN
#define RLY_PIN 14 //D5
#define PIR_PIN 15 //D8
#define OUT1_PIN 0 //D3
#define OUT2_PIN 2 //D4

int pirstate = LOW;
int value = 0;
int pir = 0;
int relay;

WiFiServer server(80);  // open port 80 for server connection
WiFiClient client;
void get_device_status(String id, String device_text);
int pirfung();

void setup()
{
  lcd.begin(16, 2);
  lcd.backlight();
  pinMode(OUT1_PIN, OUTPUT);
  pinMode(RLY_PIN, OUTPUT);
  pinMode(PIR_PIN, INPUT);
  Serial.begin(115200); //initialise the serial communication
  delay(20);

  WiFi.begin(ssid, pwd);


  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    lcd.setCursor(0, 0);
    lcd.print(".");
    Serial.print(".");
  }
  lcd.clear();//Clean the screen
  lcd.setCursor(0, 1);
  lcd.print(" connected");
  Serial.println(" connected");
  delay(1000);
  server.begin();
}

void loop()
{
  //call_test();
lcd.clear();//Clean the screen
  get_device_status("1", "ROOM HI-202");
  pirfung();
}

//fungsi get status 
void get_device_status(String id, String device_text)  {

  WiFiClient client = server.available();

  HTTPClient http;
  String url = get_host + "/sloelab/ardacces.php?id=" + id;
  http.begin(url);
  //GET method
  int httpCode = http.GET();
  String payload = http.getString();
  
  if (payload == "0") {

    digitalWrite(RLY_PIN, LOW);
    digitalWrite(OUT1_PIN, LOW);
    digitalWrite(OUT2_PIN, HIGH);
    lcd.setCursor(0, 0);
    lcd.print("Unlocked");
    Serial.println(device_text + " has Unlocked");

  }
  else if (payload == "1") {

    digitalWrite(RLY_PIN, HIGH);
    digitalWrite(OUT1_PIN, HIGH);
    digitalWrite(OUT2_PIN, LOW);

    lcd.setCursor(0, 0);
    lcd.print("Locked");
    Serial.println(device_text + " has Locked");
  }

  http.end();
  delay(1000);
}

// fungsi pir ke website
int pirfung() {
  pir = digitalRead(PIR_PIN);
  if (pir == 1) {
    WiFiClient client = server.available();

    HTTPClient http;
    String url1 = get_host + "/sloelab/pir.php?getpir=" + pir;

    http.begin(url1);
    //GET method
    int httpCode = http.GET();
    String payload = http.getString();
    Serial.println(payload);

    lcd.setCursor(0, 1);
    lcd.print("GERAK");
    Serial.println("GERAK");

    http.end();
    delay(1000);

  } else  if (pir == 0) {
    WiFiClient client = server.available();

    HTTPClient http;
    String url1 = get_host + "/sloelab/pir.php?getpir=" + pir;
    http.begin(url1);
    //GET method
    int httpCode = http.GET();
    String payload = http.getString();
    Serial.println(payload);
    http.end();
    delay(1000);
    
    //  pir=0;
    lcd.setCursor(0, 1);
    lcd.print("GAKGERAK");
    Serial.println("GAKGERAK");
  }
  delay(1000);
}
