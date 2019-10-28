import java.io.* ;
import java.net.* ;
import java.util.* ;

public final class server2
{
public static void main(String argv[]) throws Exception
{
// Set the port number.
int port = 9999;

// Establish the listen socket.
ServerSocket welcomeSocket = new ServerSocket(port);

// Process HTTP service requests in an infinite loop.
while (true) {
// Listen for a TCP connection request.
Socket connectionSocket = welcomeSocket.accept();

// Construct an object to process the HTTP request message.
HttpRequest request = new HttpRequest( connectionSocket );

// Create a new thread to process the request.
Thread thread = new Thread(request);

// Start the thread.
thread.start();
}}}


final class HttpRequest implements Runnable
{
final static String CRLF = "\r\n";//returning carriage return (CR) and a line feed (LF)
Socket socket;

// Constructor
 public HttpRequest(Socket socket) throws Exception
 {
  this.socket = socket;
 }

// Implement the run() method of the Runnable interface.
 //Within run(), we explicitly catch and handle exceptions with a try/catch block.
public void run()
{
try {processRequest();}catch (Exception e) {System.out.println(e);}
}

private void processRequest() throws Exception
{
// Get a reference to the socket's input and output streams.
InputStream instream = socket.getInputStream();
DataOutputStream os = new DataOutputStream(socket.getOutputStream());

// Set up input stream filters.
// Page 169 10th line down or so...
BufferedReader br = new BufferedReader(new InputStreamReader(instream));//reads the input data

// Get the request line of the HTTP request message.
String requestLine = br.readLine();// get /path/file.html version of http

// Display the request line.
System.out.println();
System.out.println(requestLine);

//Construct the response message.
String statusLine = null;
String contentTypeLine = null;
String entityBody = null;



 statusLine = "HTTP/1.0 404 fNot Found" + CRLF;//common error message
 contentTypeLine = "Content-type: " + "text/html" + CRLF;//content info
 entityBody = "<HTML>" +
  "<HEAD><TITLE>Not Found</TITLE></HEAD>" +
  "<BODY>Not Found</BODY></HTML>";



//Send the status line.
os.writeBytes(statusLine);

//Send the content type line.
os.writeBytes(contentTypeLine);

//Send a blank line to indicate the end of the header lines.
os.writeBytes(CRLF);






System.out.println("*****");
System.out.println("*****");
// Get and display the header lines.
String headerLine = null;
while ((headerLine = br.readLine()).length() != 0) {
System.out.println(headerLine);
}

//code from part 1
// Right here feed the client something
//os.writeBytes("<html><body><h1>My First Heading</h1>");
//os.writeBytes( "<p>My first paragraph.</p></body></html> ");
//os.flush();


// Close streams and socket.
os.close();
br.close();
socket.close();



}
//return the file types









//set up input output streams
private static void sendBytes(FileInputStream fis, OutputStream os) throws Exception
{
   // Construct a 1K buffer to hold bytes on their way to the socket.
   byte[] buffer = new byte[1024];
   int bytes = 0;

   // Copy requested file into the socket's output stream.
   while((bytes = fis.read(buffer)) != -1 )// read() returns minus one, indicating that the end of the file
   {
      os.write(buffer, 0, bytes);
   }}
}